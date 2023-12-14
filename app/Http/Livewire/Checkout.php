<?php

namespace App\Http\Livewire;

use App\Models\Acheminement;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\PayTech;
use App\Models\Product;
use App\Models\Souhait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $products;
    public $comments;
    public $payTech;
    public $subTotal;
    public $prodsCart;
    public $montantTransport = 0.0;
    public $etatTransport;
    public $item_price;
    public $favoris = null;
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
        
        $response = $this->payTech->send($this->item_price);

        $success = $response["success"];
        $errors = $response["errors"];

        if (count($errors) > 0) {
            $this->dispatchBrowserEvent('display-errors', [
                'errors' => $errors,
            ]);
        }else{
            
            $order = new Order([
                'user_id' => auth()->user()->id,
                'total_amount' => $this->item_price,
                'shipping' => $this->montantTransport,
                'comments' => $this->comments,
                'reference' => "#smb".date("dmYHis"),
            ]);
            
            $order->save();

            foreach ($this->prodsCart as $cart) {
                $order->products()->attach($cart->product->id, ['quantity' => $cart->qte, 'price' => $cart->product->prix]);
            }

            $this->dispatchBrowserEvent("successOrder");
        }
    }

    public function render()
    {
        $this->products = Cart::where("user_id", Auth::user()->id)->get();

        $this->prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $this->prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($this->prodsCart as $c) {
                $total += ($c->product->prix * $c->qte);  
            }

            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        $this->payTech = new PayTech();

        $this->initProducts();
        return view('livewire.frontend.checkout', [
            "achms" => Acheminement::orderBy("nom", "ASC")->get()
        ])->layout("layouts.app", [
            "prodsCart" => $this->prodsCart,
            "total" => $total,
            "favoris" => $this->favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
        ]);
    }

    public function initProducts(){
        $this->subTotal = 0;
        foreach ($this->products as $p) {
            $this->subTotal += ($p->product->prix*$p->qte);
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
