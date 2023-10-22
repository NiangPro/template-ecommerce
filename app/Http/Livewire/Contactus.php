<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contactus extends Component
{
    public function render()
    {
        return view('livewire.frontend.contactus')->layout("layouts.app");
    }
}
