<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profil extends Component
{
    public $form = [
        "id" => null,
        "nom" => "",
        "prenom" => "", 
        "adresse" => "",
        "nationalite" => "",
        "pseudo" => "",
        "pays" => "",
        "image" => null,
        "role" => "client",
        "tel" => "",
        "tel2" => null,
        "email" => "",
        "password" => "",
        "password_confirmation" => "",
    ];

    public function render()
    {
        return view('livewire.admin.profil')->layout("layouts.dashboard");
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }

        $u = User::where("id", Auth::user()->id)->first();

        $this->form["nom"] = $u->nom;
        $this->form["id"] = $u->id;
        $this->form["prenom"] = $u->prenom;
        $this->form["email"] = $u->email;
        $this->form["tel"] = $u->tel;
        $this->form["tel2"] = $u->tel2;
        $this->form["nationalite"] = $u->nationalite;
        $this->form["adresse"] = $u->adresse;
        $this->form["pays"] = $u->pays;
        $this->form["pseudo"] = $u->pseudo;
        $this->imgEditing = $u->image;
    }
}
