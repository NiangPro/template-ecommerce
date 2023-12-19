<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profil extends Component
{
    use WithFileUploads;
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
        "password_old" => "",
        "password_confirmation" => "",
    ];

    protected $messages = [
        "form.password.required" => "Ce champs est requis",
        "form.password_confirmation.required" => "Ce champs est requis",
        "form.password.confirmed" => "Les deux mots de passe sont differents",
        "form.password_old.required" => "Ce champs est requis",
    ];

    public function editInformation()
    {
        $this->validate([
            "form.nom" => "required",
            "form.prenom" => "required",
            "form.adresse" => "required",
            "form.tel" => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
            "form.tel2" => ['nullable', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
            "form.email" => "required",
            "form.pseudo" => "required",
            "form.image" => "nullable|image",
        ]);
        $u = User::where("id", $this->form["id"])->first();

        $u->prenom = ucfirst($this->form["prenom"]);
        $u->nom = ucfirst($this->form["nom"]);
        $u->email = $this->form["email"];
        $u->tel = $this->form["tel"];
        $u->tel2 = $this->form["tel2"];
        $u->pseudo = $this->form["pseudo"];
        $u->adresse = $this->form["adresse"];
        $u->pays = $this->form["pays"];
        $u->nationalite = $this->form["nationalite"];
       
        if ($this->form["image"]) {
            $img_name = uniqid().".jpg";

            $this->form["image"]->storeAs("public/images", $img_name);
            $u->image = $img_name;

        }

        $u->save();
        $this->dispatchBrowserEvent("updateInfo");
        $this->initInfo();
    }

    public function changePassword()
    {
        $this->validate([
            "form.password_old" => "required",
            "form.password_confirmation" => "required",
            "form.password" => "required|confirmed",
        ]);

        $user = User::where("id", Auth::user()->id)->first();

        // Vérifiez le mot de passe actuel
        if (Hash::check($this->form["password_old"], $user->password)) {
            // Mettez à jour le mot de passe
            $user->password = Hash::make($this->form["password"]);
            $user->save();

            $this->dispatchBrowserEvent("passwordUpdate");
            $this->form["password"] = "";
            $this->form["password_old"] = "";
            $this->form["password_confirmation"] = "";
        } else {
            $this->dispatchBrowserEvent("passwordFailed");
        }
 
    }
    public function render()
    {
        return view('livewire.admin.profil')->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }

        $this->initInfo();

    }

    public function initInfo()
    {
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
        $this->form["image"] = "";
    }
}
