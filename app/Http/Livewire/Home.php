<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.admin.home',[
            "clients" => User::where("role", "client")->get(),
            "produits" => Product::all(),
            "categories" => Category::all(),
            "orders" => Order::orderBy("id", "DESC")->limit(10)->get(),
            "commandes" => Order::all()
        ])->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
