<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Acheminement extends Component
{
    public function render()
    {
        return view('livewire.admin.acheminement')->layout("layouts.dashboard");
    }
}
