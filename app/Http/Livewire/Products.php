<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        return view('livewire.admin.products')->layout("layouts.dashboard");
    }
}
