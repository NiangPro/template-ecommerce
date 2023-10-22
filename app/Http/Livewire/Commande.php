<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Commande extends Component
{
    public function render()
    {
        return view('livewire.admin.commande')->layout("layouts.dashboard");
    }
}
