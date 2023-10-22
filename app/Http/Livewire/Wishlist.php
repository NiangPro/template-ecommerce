<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Wishlist extends Component
{
    public function render()
    {
        return view('livewire.frontend.wishlist')->layout("layouts.app");
    }
}
