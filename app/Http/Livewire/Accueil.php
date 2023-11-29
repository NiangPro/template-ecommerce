<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Accueil extends Component
{
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

        return view('livewire.frontend.accueil',[
            'categories' => Category::orderBy("nom", "ASC")->get(),
            "produits" => Product::orderBy("id", "DESC")->get(),
            "produitSlider" => Product::orderBy("id", "DESC")->Limit(4)->get(),
            "CategorieSlider" => Category::orderBy("id", "DESC")->Limit(4)->get(),
        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total
        ]);
    }
}
