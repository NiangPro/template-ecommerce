<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiting\Limit;
use Livewire\Component;

class ArchiveProduct extends Component
{
    public $idCategory;

    public function addToWishlist($product_id){
        if (Auth::user()) {
           $fav = Souhait::where("product_id", $product_id)->first();
           if ($fav) {
                $this->dispatchBrowserEvent("existFavori");
           }else{
                Souhait::create([
                    "user_id" => Auth::user()->id,
                    "product_id" => $product_id,
                ]);
                $this->dispatchBrowserEvent("favoriAdded");
           }
        }else{
            $this->dispatchBrowserEvent("noLogged");
        }
    }

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
        $favoris = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += $c->product->prix; 
            }

            $favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        return view('livewire.frontend.archive-product',[
            "produits" => Product::where("category_id", $this->idCategory)->orderBy("id", "DESC")->get(),
            "category" => Category::orderBy("id", "DESC")->get(),

        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
        ]);
    }

    public function mount($slug, $id)
    {
        $this->idCategory = $id;
    }
}
