<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Admins extends Component
{
    use WithFileUploads;

    public $type = "list";
    public $imgEditing = null;
    public $title = "La liste des administrateurs";

    public $form = [
        "id" => null,
        "nom",
        "prenom", 
        "adresse",
        "nationalite",
        "pseudo",
        "pays",
        "adresse" => 0,
        "image" => null,
        "role" => "admin",
        "tel",
        "tel2" => null,
        "email",
        "password",
        "password_confirmation",
    ];

    protected $rules = [
        "form.nom" => "required",
        "form.prenom" => "required",
        "form.adresse" => "required",
        "form.tel" => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
        "form.tel2" => ['nullable', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
        "form.email" => "required|unique",
        "form.pseudo" => "required|unique",
        "form.password" => "required|confirmed",
    ];

    protected $messages = [
        "form.nom.required" => "Le nom est obligatoire",
        "form.prenom.required" => "Le prénom est obligatoire",
        "form.adresse.required" => "L'adresse est obligatoire",
        "form.tel.required" => "Le numéro de téléphone est obligatoire",
        "form.tel.min" => "Le numéro de téléphone doit avoir 9 chiffres",
        "form.tel.max" => "Le numéro de téléphone doit avoir 9 chiffres",
        "form.tel.regex" => "Le numéro de téléphone invalide",
        "form.tel2.min" => "Le numéro de téléphone doit avoir 9 chiffres",
        "form.tel2.max" => "Le numéro de téléphone doit avoir 9 chiffres",
        "form.tel2.regex" => "Le numéro de téléphone invalide",
        "form.email.required" => "L'email est obligatoire",
        "form.email.unique" => "L'email existe dèjà",
        "form.password.required" => "Le mot de passe est obligatoire",
        "form.password.confirmed" => "Les mots de passe spnt différents",
        "form.pseudo.required" => "Le nom d'utilisateur est obligatoire",
        "form.pseudo.unique" => "Le nom d'utilisateur existe dèjà",
    ];

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout Administrateur";
        }elseif ($this->type == "edit") {
            $this->title = "Edition Administrateur";
        }else{
            $this->title = "La liste des administrateur";
            $this->initForm();
        }
    }

    public function render()
    {
        return view('livewire.admin.administrateur.admins')->layout("layouts.dashboard");
    }
}
