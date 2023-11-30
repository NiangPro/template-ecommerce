<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleProduct extends Component
{
    public $idProduit = null;
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
        
        return view('livewire.frontend.single-product',[
            "product" => Product::where("id", $this->idProduit)->first(),
            "produits" => Product::orderBy("id", "DESC")->get(),
        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total
        ]);
    }

    public function mount($id)
    {
        $this->idProduit = $id;
    }
}
