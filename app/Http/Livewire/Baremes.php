<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Baremes extends Component
{
    public function render()
    {
        return view('livewire.baremes')->layout("layouts.dashboard");
    }
}
