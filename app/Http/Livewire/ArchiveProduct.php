<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ArchiveProduct extends Component
{
    public $idCategory;
    public function render()
    {
        return view('livewire.frontend.archive-product')->layout("layouts.app");
    }

    public function mount($slug, $id)
    {
        $this->idCategory = $id;
    }
}
