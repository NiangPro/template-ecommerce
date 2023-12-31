<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Publicite;
use App\Models\Shop;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiting\Limit;
use Livewire\Component;
use Livewire\WithPagination;

class ArchiveProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $idCategory;
    public $products;
    protected $produits;

    public $filters = [
        'categories' => [],
    ];

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

    public function addToCart($product_id)
    {
        // dd($product_id);
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

    public function getFilter(){
        $this->filters['categories'] = array_filter($this->filters['categories']);

        if (empty($this->filters['categories'])) {
            return Product::where("category_id", $this->idCategory)->where("type", 0)->orderBy("id", "DESC")->paginate(6);
        }

        return Product::whereIn('category_id', array_keys($this->filters['categories']))->where("type", 0)->orderBy("id", "DESC")->paginate(6);

    }

    public function render()
    {
        $this->produits = $this->getFilter();
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

        

        return view('livewire.frontend.archive-product',[
            "produits" => $this->produits,
            "category" => Category::orderBy("id", "DESC")->get(),

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

    public function mount($slug, $id)
    {
        $this->idCategory = $id;
    }
}
