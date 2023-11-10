<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Visiteurs extends Component
{
    public function render()
    {
        return view('livewire.frontend.visiteurs')->layout("layouts.app");
    }
}
