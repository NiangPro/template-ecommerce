<?php

namespace App\Http\Livewire;

use App\Models\Product;
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
        ])->layout("layouts.dashboard");
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
