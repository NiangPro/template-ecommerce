<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArchiveProduct extends Component
{
    public $idCategory;
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

        return view('livewire.frontend.archive-product',[
            "produits" => Product::where("category_id", $this->idCategory)->orderBy("id", "DESC")->get(),

        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total
        ]);
    }

    public function mount($slug, $id)
    {
        $this->idCategory = $id;
    }
}
