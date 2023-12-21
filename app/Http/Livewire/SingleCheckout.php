<?php

namespace App\Http\Livewire;

use App\Models\Acheminement;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Livraison;
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
    public $etatAch = 0;
    public $montantTransport = 0;
    public $montantAcheminement = 0;
    public $item_price;
    public $comments;
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
        }else{
            $this->etatAch = 1;
        }
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

    public function mount($id)
    {
        $this->idProduit = $id;
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
    }

    public function initProducts(){
        $this->subTotal = 0;
        if ($this->singleProduct->reduction > 0) {
            $this->subTotal += ($this->singleProduct->reduction*$this->singleProduct->qte);
        } else {
            $this->subTotal += ($this->singleProduct->prix*$this->singleProduct->qte);
        }
        
        
        $this->item_price = $this->subTotal + $this->montantTransport;

    }
}
