<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Acheminement extends Component
{
    public function render()
    {
        return view('livewire.acheminement')->layout("layouts.dashboard");
    }
}
