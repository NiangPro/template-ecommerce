<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Deconnexion extends Component
{
    public function deconnecter()
    {
        Auth()->logout();
        return redirect(route("accueil"));
    }
    public function render()
    {
        return view('livewire.frontend.deconnexion');
    }
}
