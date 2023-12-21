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
    public $pays="";

    public function selectedPays($pays){
        $this->pays=$pays;
        if($this->pays){
            return Acheminement::where("pays", $this->pays)->orderBy("id", "DESC")->get();
        }else{
            return Acheminement::orderBy("pays", "ASC")->get();
        }
    }

    public function render()
    {
        $this->prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $this->prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($this->prodsCart as $c) {
                $prix = $c->product->reduction > 0 ? $c->product->reduction:$c->product->prix;
                $total += ($prix * $c->qte);   
            }

            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }
        
        return view('livewire.frontend.out-products',[
            "outproducts" => Acheminement::orderBy('pays', 'ASC')->get(),
            "paysSelected" => $this->selectedPays($this->pays),
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
