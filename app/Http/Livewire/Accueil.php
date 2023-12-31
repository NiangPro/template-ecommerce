<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Partener;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Reglage;
use App\Models\Shop;
use App\Models\Souhait;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Accueil extends Component
{
    public $tabpanProduct = [];
    public $reglage;


    public function isFavori($id_produit){
        if (Auth::user()) {
            return Souhait::where("product_id", $id_produit)->where("user_id", Auth::user()->id)->first();
        }else{
            return false;
        }
    }

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
            $this->dispatchBrowserEvent("noLoggedFavori");
        }
    }
    
    public function changeCategory($idCategory){
        $this->tabpanProduct = Product::where("category_id", $idCategory)->where("type", 0)->orderBy("id", "DESC")->limit(6)->get();
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
                $prix = $c->product->reduction > 0 ? $c->product->reduction:$c->product->prix;
                $total += ($prix * $c->qte); 
            }

            $favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        return view('livewire.frontend.accueil',[
            'parteners' => Partener::all(),
            'categories' => Category::orderBy("nom", "ASC")->Limit(12)->get(),
            'categoryType' => Category::orderBy("id", "DESC")->Limit(4)->get(),
            "produits" => Product::orderBy("id", "DESC")->where("type", 0)->get(),
            "produitsRec" => Product::orderBy("id", "DESC")->where("type", 0)->Limit(4)->get(),
            "produitSlider" => Product::orderBy("id", "DESC")->where("type", 0)->Limit(5)->get(),
            "CategorieSlider" => Category::orderBy("id", "DESC")->Limit(4)->get(),
            "banner" => Publicite::where("type", "banner")->first(),
            "minipubs" => Publicite::where("type", "mini")->limit(3)->get(),
            "offreproduits" => Product::orderBy("id", "DESC")->where("type", 0)->where("reduction", "!=", 0)->limit(2)->get()
        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->where("type", 0)->Limit(6)->get(),
            "menupubs" => Publicite::where("type", "mini")->limit(3)->get(),
            "shop" => Shop::first()
        ]);
    }

    public function mount()
    {
        $this->reglage = new Reglage();

        $this->reglage->createFirstAdmin();
        $this->reglage->createFirstClientDemo();
        $this->reglage->createShop();
    }
}
