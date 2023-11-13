<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Admins extends Component
{
    use WithFileUploads, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $type = "list";
    public $idDeleting = null;
    public $imgEditing = null;
    public $title = "La liste des administrateurs";

    public $form = [
        "id" => null,
        "nom" => "",
        "prenom" => "", 
        "adresse" => "",
        "nationalite" => "",
        "pseudo" => "",
        "pays" => "",
        "image" => null,
        "role" => "admin",
        "tel" => "",
        "tel2" => null,
        "email" => "",
        "password" => "",
        "password_confirmation" => "",
    ];

    protected $rules = [
        "form.nom" => "required",
        "form.prenom" => "required",
        "form.adresse" => "required",
        "form.tel" => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
        "form.tel2" => ['nullable', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
        "form.email" => "required",
        "form.pseudo" => "required",
        "form.password" => "required|confirmed",
        "form.image" => "nullable|image",
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
        "form.image.image" => "Veillez selectionner une image",
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

    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $u = User::where("id", $this->idDeleting)->first();

        $u->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deleteAdmin");
    }

    public function editer($id)
    {
        $u = User::where("id", $id)->first();

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

        $this->changeType("edit");
    }

    public function store()
    {
        if ($this->form["id"]) {
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
           
            if ($this->form["image"]) {
                $img_name = uniqid().".jpg";

                $this->form["image"]->storeAs("public/images", $img_name);
                $u->image = $img_name;

            }

            $u->save();
            $this->dispatchBrowserEvent("updateAdmin");

        }else{

            $this->validate();

            if ($this->form["image"]) {
                $img_name = uniqid().".jpg";

                $this->form["image"]->storeAs("public/images", $img_name);

            }else{
                $img_name = "profil.png";
            }

            User::create([
                "prenom" => ucfirst($this->form["prenom"]),
                "nom" => ucfirst($this->form["nom"]),
                "adresse" => $this->form["adresse"],
                "pays" => $this->form["pays"],
                "nationalite" => $this->form["nationalite"],
                "email" => $this->form["email"],
                "pseudo" => $this->form["pseudo"],
                "role" => $this->form["role"],
                "tel" => $this->form["tel"],
                "tel2" => $this->form["tel2"],
                "image" => $img_name,
                "password" => Hash::make($this->form["password"])
            ]);

            $this->dispatchBrowserEvent("addAdmin");
        }
        $this->changeType("list");
    }

    public function render()
    {
        return view('livewire.admin.administrateur.admins', [
            "admins" => User::where("role", "admin")->paginate(6)
        ])->layout("layouts.dashboard");
    }

    public function initForm()
    {
        $this->form["id"] = null;
        $this->form["nom"] = "";
        $this->form["prenom"] = ""; 
        $this->form["adresse"] = "";
        $this->form["nationalite"] = "";
        $this->form["pseudo"] = "";
        $this->form["pays"] = "";
        $this->form["image"] = null;
        $this->form["role"] = "admin";
        $this->form["tel"] = "";
        $this->form["tel2"] = null;
        $this->form["email"] = "";
        $this->form["password"] = "";
        $this->form["password_confirmation"] = "";

        $this->imgEditing = null;
        $this->idDeleting = null;
    }
}
