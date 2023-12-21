<?php

namespace App\Http\Livewire;

use App\Models\Acheminement;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Livraison;
use App\Models\Order;
use App\Models\PayTech;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Shop;
use App\Models\Souhait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleCheckout extends Component
{
    public $prodsCart;
    public $favoris;
    public $idProduit = null;
    public $singleProduct;
    public $subTotal;
    public $payTech;
    public $etatAch = 0;
    public $montantTransport = 0;
    public $prixAcheminement = 0;
    public $jourAcheminement;
    public $typeAcheminement;
    public $montantAcheminement = 0;
    public $item_price;
    public $comments;
    public $qte;
    public $form = [
        "id" => null,
        "nom" => "",
        "prenom" => "", 
        "adresse" => "",
        "nationalite" => "",
        "pays" => "",
        "image" => null,
        "tel" => "",
        "tel2" => null,
        "email" => "",
    ];

    public function initAmount(){
        $this->montantTransport = 0;
        $this->dispatchBrowserEvent("cachedSection");
    }

    public function changeEtat($type)
    {
        if ($type == "bateau") {
            $this->etatAch = 0;
            $this->prixAcheminement = $this->singleProduct->acheminement->prix_bateau;
            $this->jourAcheminement = $this->singleProduct->acheminement->nbrejour_bateau;
            $this->typeAcheminement = "Bâteau";
        }else{
            $this->etatAch = 1;
            $this->prixAcheminement = $this->singleProduct->acheminement->prix_avion;
            $this->jourAcheminement = $this->singleProduct->acheminement->nbrejour_avion;
            $this->typeAcheminement = "Avion";
        }

        $this->montantAcheminement = $this->singleProduct->poids * $this->qte * $this->prixAcheminement;

    }

    public function payer()
    {
        
        // $response = $this->payTech->send($this->item_price);

        // $success = $response["success"];
        // $errors = $response["errors"];

        // if (count($errors) > 0) {
        //     $this->dispatchBrowserEvent('display-errors', [
        //         'errors' => $errors,
        //     ]);
        // }else{
            
            $order = new Order([
                'user_id' => auth()->user()->id,
                'total_amount' => $this->item_price,
                'shipping' => $this->montantTransport,
                'comments' => $this->comments,
                'reference' => "#smb".date("dmYHis"),
                'acheminement_id' => $this->singleProduct->acheminement->id,
                'prix_acheminement' => $this->prixAcheminement,
            ]);
            
            $order->save();

            $prix = $this->singleProduct->reduction > 0 ? $this->singleProduct->reduction:$this->singleProduct->prix;
            $order->products()->attach($this->singleProduct->id, ['quantity' => $this->qte, 'price' => $prix]);
            $p = Product::where("id", $this->singleProduct->id)->first();
            if ($p->qte - $this->qte < 0) {
                $p->qte = 0;
            }else{

                $p->qte = $p->qte - $this->qte;
            }
            $p->save();

            $this->dispatchBrowserEvent("successOrder");
        // }
    }

    public function render()
    {
        $this->prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $this->prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($this->prodsCart as $c) {
                $prix = $c->product->reduction > 0 ? $c->product->reduction:$c->product->prix;
                $total += ($prix * $c->qte);   
            }

            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        $this->initProducts();
        $this->payTech = new PayTech();

        
        return view('livewire.frontend.single-checkout',[
            "achms" => Acheminement::orderBy("pays", "ASC")->get(),
            "livraisons" => Livraison::orderBy("lieu", "ASC")->get()
        ])->layout("layouts.app", [
            "prodsCart" => $this->prodsCart,
            "total" => $total,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
            "favoris" => $this->favoris,
            "menupubs" => Publicite::where("type", "mini")->limit(3)->get(),
            "shop" => Shop::first()
        ]);
    }

    public function mount($id, $qte)
    {
        $this->idProduit = $id;
        $this->qte = $qte;
        $this->singleProduct = Product::where("id", $this->idProduit)->first();

        $u = User::where("id", Auth::user()->id)->first();

        $this->form["nom"] = $u->nom;
        $this->form["id"] = $u->id;
        $this->form["prenom"] = $u->prenom;
        $this->form["email"] = $u->email;
        $this->form["tel"] = $u->tel;
        $this->form["tel2"] = $u->tel2;
        $this->form["nationalite"] = $u->nationalite;
        $this->form["adresse"] = $u->adresse;
        $this->form["pays"] = $u->pays;

        $this->prixAcheminement = $this->singleProduct->acheminement->prix_bateau;
        $this->jourAcheminement = $this->singleProduct->acheminement->nbrejour_bateau;
        $this->typeAcheminement = "Bâteau";

        $this->montantAcheminement = $this->singleProduct->poids * $this->qte * $this->prixAcheminement;
    }

    public function initProducts(){
        $this->subTotal = 0;
        if ($this->singleProduct->reduction > 0) {
            $this->subTotal = ($this->singleProduct->reduction*$this->qte);
        } else {
            $this->subTotal = ($this->singleProduct->prix*$this->qte);
        }
        
        
        $this->item_price = $this->subTotal + $this->montantTransport + $this->montantAcheminement;

    }
}
