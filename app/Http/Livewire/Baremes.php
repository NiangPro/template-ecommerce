<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Baremes extends Component
{
    public function render()
    {
        return view('livewire.admin.baremes')->layout("layouts.dashboard");
    }
}
