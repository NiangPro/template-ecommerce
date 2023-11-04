<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $form = [
        "email",
        "password",
        "password_confirmation",
        "prenom",
        "nom",
        "tel",
        "adresse",
        "role",
    ];

    protected $messages = [
        "form.email.required" => "L'email est requis",
        "form.email.unique" => "L'email existe déjà",
        "form.password.required" => "Le mot de passe est requis",
        "form.password_confirmation.required" => "Le mot de passe de confirmation est requis",
        "form.password.confirmed" => "Les deux mots de passe sont différents",
        "form.prenom.required" => "Le prenom est requis",
        "form.nom.required" => "Le nom est requis",
        "form.tel.required" => "Le numero de telephone est requis",
        "form.tel.regex" => "Le numero de telephone est invalide",
        "form.adresse.required" => "L'adresse est requise",
    ];

    public function test()
    {
        dd("for test");
    }
    public function render()
    {
        return view('livewire.frontend.login')->layout("layouts.app");
    }
}
