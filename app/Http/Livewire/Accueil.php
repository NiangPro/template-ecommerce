<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Partener;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Souhait;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Accueil extends Component
{
    public $tabpanProduct = [];

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
    
    public function changeCategory($idCategory){
        $this->tabpanProduct = Product::where("category_id", $idCategory)->orderBy("id", "DESC")->limit(6)->get();
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
                $total += ($c->product->prix * $c->qte); 
            }

            $favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        return view('livewire.frontend.accueil',[
            'parteners' => Partener::all(),
            'categories' => Category::orderBy("nom", "ASC")->get(),
            'categoryType' => Category::orderBy("id", "DESC")->Limit(4)->get(),
            "produits" => Product::orderBy("id", "DESC")->get(),
            "produitsRec" => Product::orderBy("id", "DESC")->Limit(4)->get(),
            "produitSlider" => Product::orderBy("id", "DESC")->Limit(5)->get(),
            "CategorieSlider" => Category::orderBy("id", "DESC")->Limit(4)->get(),
            "banner" => Publicite::where("type", "banner")->first(),
            "minipubs" => Publicite::where("type", "mini")->limit(3)->get(),
        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
        ]);
    }
}
