<?php

namespace App\Http\Livewire;

use App\Models\Acheminement;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Shop;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OutProducts extends Component
{
    public $prodsCart;
    public $favoris;
    public $acheminements;
    public $outprods;
    public $filters = [
        'pays' => [],
    ];

    public function getFilter(){
        $this->filters['pays'] = array_filter($this->filters['pays']);

        if (empty($this->filters['pays'])) {
            return Acheminement::all();
        }

        return Acheminement::whereIn('pays', array_keys($this->filters['pays']))->get();

    }

    public function render()
    {
        $this->acheminements = $this->getFilter();
        $this->prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $this->prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($this->prodsCart as $c) {
                $prix = $c->product->reduction > 0 ? $c->product->reduction:$c->product->prix;
                $total += ($prix * $c->qte);   
            }

            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
            $this->outprods = Acheminement::all();
            // $prodPaginate = $this->outprods->produits();
            // first()->sites()->paginate(10);
        }
        
        return view('livewire.frontend.out-products',[
            "acheminements" => $this->acheminements,
            "outproducts" => Acheminement::all(),
        ])->layout("layouts.app", [
            "prodsCart" => $this->prodsCart,
            "total" => $total,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
            "favoris" => $this->favoris,
            "menupubs" => Publicite::where("type", "mini")->limit(3)->get(),
            "shop" => Shop::first()
        ]);
    }
}
