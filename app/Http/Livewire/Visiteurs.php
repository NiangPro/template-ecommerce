<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Souhait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Visiteurs extends Component
{
    public $favoris = null;
    public $userOrders;

    public function render()
    {
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += ($c->product->prix * $c->qte); 
            }
            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }
        $this->userOrders = auth()->user()->orders()->with('products')->get();

        dd($this->userOrders);

        return view('livewire.frontend.visiteurs',[
            "produits" => Product::orderBy("id", "DESC")->get(),

        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
            "favoris" => $this->favoris,
        ]);
    }
}
