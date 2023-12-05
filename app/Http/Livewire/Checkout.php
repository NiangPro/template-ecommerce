<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $products;

    public $subTotal;

    public $favoris = null;

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
        return view('livewire.frontend.checkout')->layout("layouts.app", [
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
}
