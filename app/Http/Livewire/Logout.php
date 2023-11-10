<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function deconnecter()
    {
        Auth::logout();
        
        return redirect(route("accueil"));
    }
    public function render()
    {
        return view('livewire.logout');
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
