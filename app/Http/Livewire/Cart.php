<?php

namespace App\Http\Livewire;

use App\Models\Cart as ModelsCart;
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
                $total += ($c->product->prix * $c->qte); 
            }

            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }

        $this->initProducts();
        return view('livewire.frontend.cart')->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "favoris" => $this->favoris,
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
            $this->tabProds[] = ["id" => $p->id, "prix" => $p->product->prix, "nom" => $p->product->nom, "qte" => $p->qte, "image" => $p->product->image];
            $this->subTotal += ($p->product->prix*$p->qte);
        }

    }
}
 