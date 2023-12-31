<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Shop;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleProduct extends Component
{
    public $idProduit = null;
    public $favoris = null;
    public $qte = 1;
    public $singleProduct;
    public $imgGalerie;

    public function isFavori($id_produit){
        if (Auth::user()) {
            return Souhait::where("product_id", $id_produit)->where("user_id", Auth::user()->id)->first();
        }else{
            return false;
        }
    }

    public function gotoCheckout()
    {
        if (Auth()->user()) {
            redirect(route('singleCheckout', ["id" => $this->singleProduct->id, "qte"=>$this->qte]));
        }else{
            $this->dispatchBrowserEvent("noLogged");
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

    public function addToCart()
    {
        if (Auth::user()) {
            $ct = Cart::where("product_id", $this->idProduit)->first();
            if ($ct) {
                if ($ct->product->qte >= $this->qte) {
                    $ct->qte = $this->qte;
                    $ct->save();
                    $this->dispatchBrowserEvent("productUpdate");
                }else{
                    $this->dispatchBrowserEvent("lowQuantity");
                }
            }else{
                $p = Product::find($this->idProduit);
                if ($p->qte >= $this->qte) {
                    Cart::create([
                        "product_id" => $this->idProduit,
                        "user_id" => Auth::user()->id,
                        "qte" => $this->qte
                    ]);
                    $this->dispatchBrowserEvent("productAdded");
                }else{
                    $this->dispatchBrowserEvent("lowQuantity");
                }
                
            }
            
        }else{
            $this->dispatchBrowserEvent("noLogged");
            $this->emit('someEvent');
        }
    }

    public function render()
    {
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $prix = $c->product->reduction > 0 ? $c->product->reduction:$c->product->prix;
                $total += ($prix * $c->qte);  
            }
            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }
        
        return view('livewire.frontend.single-product',[
            "product" => Product::where("id", $this->idProduit)->first(),
            "produits" => Product::orderBy("id", "DESC")->where("category_id", $this->singleProduct->category_id)->where("type", 0)->limit(4)->get(),
        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $this->favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->where("type", 0)->Limit(6)->get(),
            "menupubs" => Publicite::where("type", "mini")->limit(3)->get(),
            "shop" => Shop::first()
        ]);
    }

    public function mount($id)
    {
        $this->idProduit = $id;
        $this->singleProduct = Product::where("id", $this->idProduit)->first();
    }
}
