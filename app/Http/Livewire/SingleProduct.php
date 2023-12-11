<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleProduct extends Component
{
    public $idProduit = null;
    public $favoris = null;
    public function render()
    {
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += ($c->product->prix * $c->qte); 
            }
            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        $produit = Product::where("id", $this->idProduit)->first();

        
        return view('livewire.frontend.single-product',[
            "product" => Product::where("id", $this->idProduit)->first(),
            "produits" => Product::orderBy("id", "DESC")->where("category_id", $produit->category_id)->Limit(4)->get(),
        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $this->favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
        ]);
    }

    public function mount($id)
    {
        $this->idProduit = $id;
    }
}
