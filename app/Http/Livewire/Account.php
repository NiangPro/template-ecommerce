<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Account extends Component
{
    public function render()
    {
        return view('livewire.frontend.account')->layout("layouts.app");
    }
}
