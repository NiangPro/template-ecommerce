<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Commande extends Component
{
    public function render()
    {
        return view('livewire.commande')->layout("layouts.dashboard");
    }
}
