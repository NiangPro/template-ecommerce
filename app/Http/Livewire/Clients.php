<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Clients extends Component
{
    public function render()
    {
        return view('livewire.admin.clients')->layout("layouts.dashboard");
    }
}
