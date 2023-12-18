<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Livewire\Component;

class Contactus extends Component
{
    public function render()
    {
        return view('livewire.frontend.contactus')->layout("layouts.app",[
            "shop" => Shop::first()
        ]);
    }
}
