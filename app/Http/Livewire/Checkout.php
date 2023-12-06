<?php

namespace App\Http\Livewire;

use App\Models\Acheminement;
use App\Models\Cart;
<<<<<<< HEAD
use App\Models\Souhait;
=======
use App\Models\User;
>>>>>>> main
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $products;

    public $subTotal;

<<<<<<< HEAD
    public $favoris = null;
=======
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
>>>>>>> main

    public function render()
    {
        $this->products = Cart::where("user_id", Auth::user()->id)->get();

        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += ($c->product->prix * $c->qte);  
            }

            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        $this->initProducts();
        return view('livewire.frontend.checkout', [
            "achms" => Acheminement::orderBy("nom", "ASC")->get()
        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $this->favoris,
        ]);
    }

    public function initProducts(){
        $this->subTotal = 0;
        foreach ($this->products as $p) {
            $this->subTotal += ($p->product->prix*$p->qte);
        }

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
