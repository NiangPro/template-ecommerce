<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        return view('livewire.frontend.cart')->layout("layouts.app");
    }
}
