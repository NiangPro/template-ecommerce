<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiting\Limit;
use Livewire\Component;

class ArchiveProduct extends Component
{
    public $idCategory;

    public function addToCart($product_id)
    {
        if (Auth::user()) {
            $ct = Cart::where("product_id", $product_id)->first();
            if ($ct) {
               $this->dispatchBrowserEvent("existProduct");
            }else{
                Cart::create([
                    "product_id" => $product_id,
                    "user_id" => Auth::user()->id,
                    "qte" => 1
                ]);
                $this->dispatchBrowserEvent("productAdded");
            }
            
        }else{
            $this->dispatchBrowserEvent("noLogged");
        }
    }

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
            "category" => Category::orderBy("id", "DESC")->get(),

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
