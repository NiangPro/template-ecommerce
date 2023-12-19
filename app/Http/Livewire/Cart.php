<?php

namespace App\Http\Livewire;

use App\Models\Cart as ModelsCart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Shop;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $products;

    public $subTotal;

    public $tabProds = [];

    public $favoris = null;

    public function removeCart($id)
    {
        $c = ModelsCart::where("id", $id)->first();
        $c->delete($id);
        $this->dispatchBrowserEvent("removeCart");
    }

    public function changeQteProd($id, $key)
    {
        $ct = ModelsCart::where("id", $id)->first();

        if ($ct->product->qte >= $this->tabProds[$key]["qte"]) {
            $ct->qte = $this->tabProds[$key]["qte"];
            $ct->save();
        }else{
            $this->dispatchBrowserEvent("lowQuantity");
        }
        $this->initProducts();
        
    }

    public function refreshCart()
    {
        $this->dispatchBrowserEvent("refresh");
    }

    public function render()
    {
        $this->products = ModelsCart::where("user_id", Auth::user()->id)->get();
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = ModelsCart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $prix = $c->product->reduction > 0 ? $c->product->reduction:$c->product->prix;
                $total += ($prix * $c->qte); 
            }

            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        $this->initProducts();
        return view('livewire.frontend.cart')->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $this->favoris,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
            "menupubs" => Publicite::where("type", "mini")->limit(3)->get(),
            "shop" => Shop::first()
        ]);
    }

    public function mount()
    {
        if (!Auth()->user()) {
            return redirect(route("login"));
        }
    }

    public function initProducts(){
        $this->tabProds = [];
        $this->subTotal = 0;
        foreach ($this->products as $p) {
            $prix = $p->product->reduction > 0 ? $p->product->reduction:$p->product->prix;
            $this->tabProds[] = ["id" => $p->id, "prix" => $prix, "nom" => $p->product->nom, "qte" => $p->qte, "image" => $p->product->image];
            $this->subTotal += ($prix*$p->qte);
        }

    }
}
 