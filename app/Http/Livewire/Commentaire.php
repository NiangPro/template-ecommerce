<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Livewire\Component;

class Commentaire extends Component
{
    public function render()
    {
        return view('livewire.admin.commentaire')->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }
}
