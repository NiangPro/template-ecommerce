<?php

namespace App\Http\Livewire;

use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $products;

    public $qtes = [];

    public function removeCart($id)
    {
        $c = ModelsCart::where("id", $id)->first();
        $c->delete($id);
        $this->dispatchBrowserEvent("removeCart");
    }

    public function render()
    {
        $this->products = ModelsCart::where("user_id", Auth::user()->id)->get();
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = ModelsCart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += $c->product->prix; 
            }
        }
        return view('livewire.frontend.cart')->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total
        ]);
    }

    public function mount()
    {
        if (!Auth()->user()) {
            return redirect(route("login"));
        }
    }
}
