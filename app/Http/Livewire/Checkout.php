<?php

namespace App\Http\Livewire;

use App\Mail\MailClient;
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
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Checkout extends Component
{
    public $products;
    public $payTech;
    public $prodsCart;
    public $subTotal;
    public $montantTransport = 0;
    public $item_price;
    public $etatTransport;
    public $favoris = null;
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
    public function calculTransport($cle)
    {
        $this->montantTransport = 0;
        if ($this->etatTransport != $cle) {
            $ach = Acheminement::find($cle);

            foreach ($this->products as $c) {
                $this->montantTransport += ($c->qte * $c->product->poids * $ach->prix);
            }
        }else{
            $cle = -1;
        }

        $this->etatTransport = $cle;
        $this->initProducts();
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
            ]);
            
            $order->save();

            foreach ($this->prodsCart as $cart) {
                $prix = $cart->product->reduction > 0 ? $cart->product->reduction:$cart->product->prix;
                $order->products()->attach($cart->product->id, ['quantity' => $cart->qte, 'price' => $prix]);
                $p = Product::where("id", $cart->product->id)->first();
                $p->qte = $p->qte - $cart->qte;
                $p->save();

                $c = Cart::where("id", $cart->id)->first();
                $c->delete();
            }
            // $mailData = [
            //     "title" => "Message de SUNU MARKET BUSINESS",
            //     "body" => "Votre commande a été validée",
            // ];

            // Mail::to(auth()->user()->email)->send(new MailClient($mailData));
            $this->dispatchBrowserEvent("successOrder");
        // }
    }

    public function render()
    {
        $this->products = Cart::where("user_id", Auth::user()->id)->get();

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

        $this->payTech = new PayTech();

        $this->initProducts();
        return view('livewire.frontend.checkout', [
            "achms" => Acheminement::orderBy("pays", "ASC")->get(),
            "livraisons" => Livraison::orderBy("lieu", "ASC")->get()
        ])->layout("layouts.app", [
            "prodsCart" => $this->prodsCart,
            "total" => $total,
            "favoris" => $this->favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
            "menupubs" => Publicite::where("type", "mini")->limit(3)->get(),
            "shop" => Shop::first()
        ]);
    }

    public function initProducts(){
        $this->subTotal = 0;
        foreach ($this->products as $p) {
            $prix = $p->product->reduction > 0 ? $p->product->reduction:$p->product->prix;
            $this->subTotal += ($prix*$p->qte);
        }

        $this->item_price = $this->subTotal + $this->montantTransport;

    }

    public function mount()
    {
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
}
