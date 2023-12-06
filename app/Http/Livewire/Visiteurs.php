<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Visiteurs extends Component
{
    public function render()
    {
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += ($c->product->prix * $c->qte); 
            }
        }
        return view('livewire.frontend.visiteurs',[
            "produits" => Product::orderBy("id", "DESC")->get(),

        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => Auth::user() ? Souhait::where("user_id", Auth::user()->id)->get() : null
        ]);
    }
}
