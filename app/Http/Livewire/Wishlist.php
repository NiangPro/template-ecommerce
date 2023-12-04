<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlist extends Component
{
    public function render()
    {
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += $c->product->prix; 
            }
        }

        return view('livewire.frontend.wishlist')->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total
        ]);
    }
}
