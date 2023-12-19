<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Baremes extends Component
{
    public function render()
    {
        return view('livewire.admin.baremes')->layout("layouts.dashboard",[
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
