<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Accueil extends Component
{
    public function render()
    {
        return view('livewire.accueil')->layout("layouts.app");
    }
}
