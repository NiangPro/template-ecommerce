<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Livewire\Component;

class Livraisons extends Component
{
    public function render()
    {
        return view('livewire.admin.livraison.livraisons')->layout("layouts.dashboard",[
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
