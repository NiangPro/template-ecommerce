<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profil extends Component
{
    public function render()
    {
        return view('livewire.admin.profil')->layout("layouts.dashboard");
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
