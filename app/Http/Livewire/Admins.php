<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Admins extends Component
{
    public function render()
    {
        return view('livewire.admin.admins')->layout("layouts.dashboard");
    }
}
