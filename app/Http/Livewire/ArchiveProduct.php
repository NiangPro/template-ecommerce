<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ArchiveProduct extends Component
{
    public function render()
    {
        return view('livewire.frontend.archive-product')->layout("layouts.app");
    }
}
