<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Categories extends Component
{
    public $type = "list";

    public function changeType($type)
    {
        $this->type = $type;
    }
    public function render()
    {
        return view('livewire.admin.category.categories')->layout("layouts.dashboard");
    }
}
