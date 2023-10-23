<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{

    public $form1 = [
        "prenom" => "",
        "nom" => "",
        "nationalite" => "",
        "pays" => "",
        "pseudo" => "",
        "adresse" => "",
        "role" => "",
        "tel" => "",
        "tel2" => "",
        "email" => "",
        "password" => "",
    ];

     public $form2 = [
        "email" => "",
        "password" => "",
    ];

    protected  $messages = [
        'form1.prenom.required' => 'Le prenom est requis',
        'form1.nom.required' => 'Le nom est requis',
        'form1.nationalite.required' => 'la nationnalite est requise',
        'form1.adresse.required' => 'L\'adresse est requis',
        'form1.tel.required' => 'Le telephone est requis',
        'form1.tel.regex' => 'Le n° de telephone est invalide',
        'form1.tel.min' => 'Le n° de telephone doit avoir au minimum 9 chiffres',
        'form1.tel.max' => 'Le n° de telephone doit avoir au maximum 9 chiffres',
        'form1.email.required' => 'L\'email est requis',
        'form1.password.required' => 'Le mot de passe est requis',
        'form1.role.required' => 'Le role est requis',
        'form2.email.required' => 'L\'email est requis',
        'form2.password.required' => 'Le mot de passe est requis',
    ];

    // connexion
    public function login(){
        $this->validate([
            "form2.email" => "required|email",
            "form2.password" => "required",
        ]);
        if(Auth::attempt(['email' => $this->form2['email'], 'password' => $this->form2['password']]))
        {
            return redirect(route('home'));
        }else{
            $this->dispatchBrowserEvent("badConnection");
        }
    }

    // inscription
    public function register(){
        $this->form1['role'] = "client";
        $this->validate([
            'form1.prenom' => 'required|string',
            'form1.nom' => 'required|string',
            'form1.nationalite' => 'nullable|string',
            'form1.pays' => 'nullable|string',
            'form1.pseudo' => 'required|string',
            'form1.adresse' => 'required|string',
            'form1.role' => 'required|string',
            'form1.tel' => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
            'form1.tel2' => 'nullable|string',
            'form1.email' => 'required|string',
            'form1.password' => 'required|confirmed|string',
        ]);

        User::create([
            'prenom' => $this->form1['prenom'],
            'nom' => $this->form1['nom'],
            'nationalite' => $this->form1['nationalite'] ?: null,
            'pays' => $this->form1['pays'] ?: null,
            'pseudo' => $this->form1['pseudo'] ?: null,
            'adresse' => $this->form1['adresse'], 
            'role' => $this->form1['role'],
            'tel' => $this->form1['tel'],
            'tel2' => $this->form1['tel2']  ?: null,
            'email' => $this->form1['email'],
            'password' => Hash::make($this->form1['password']),
        ]);

        $this->dispatchBrowserEvent("addSuccessful");
        $this->initForm();
        return redirect(route('login'));
    }

    public function initForm()
    {
        $this->form1['prenom'] = "";
        $this->form1['nom'] = "";
        $this->form1['nationalite'] = "";
        $this->form1['pays'] = "";
        $this->form1['pseudo'] = "";
        $this->form1['adresse'] = "";
        $this->form1['tel'] = "";
        $this->form1['tel2'] = "";
        $this->form1['email'] = "";
        $this->form1['password'] = "";
    }

    public function render()
    {
        return view('livewire.login')->layout("layouts.app");
    }
}
