<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class General extends Component
{
    public $image;
    public $form = [
        "nom" => "",
        "tel" => "",
        "slogan" => "",
        "sigle" => "",
        "fixe" => "",
        "image" => "",
        "adresse" => "",
        "email" => "",
        "password" => "",
        "user_id" => "",
        "password_confirmation" => "",
    ];

    protected $messages = [
        "form.password.required" => "Ce champs est requis",
        "form.password_confirmation.required" => "Ce champs est requis",
        "form.password.confirmed" => "Les deux mots de passe sont differents",
        "form.user_id.required" => "Veuillez selectionner un utilisateur",
    ];

    public function changePassword()
    {
        $this->validate([
            "form.user_id" => "required",
            "form.password_confirmation" => "required",
            "form.password" => "required|confirmed",
        ]);

        $user = User::where("id", $this->form["user_id"])->first();

       // Mettez à jour le mot de passe
            $user->password = Hash::make($this->form["password"]);
            $user->save();

            $this->dispatchBrowserEvent("passwordUpdate");
            $this->form["password"] = "";
            $this->form["user_id"] = null;
            $this->form["password_confirmation"] = "";
 
    }

    public function editInformation()
    {
        $this->validate([
            "form.nom" => "required",
            "form.tel" => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
            "form.fixe" => ['nullable', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
            "form.email" => "required",
            "form.image" => "nullable|image",
        ]);
        $u = Shop::first();

        $u->nom = ucfirst($this->form["nom"]);
        $u->email = $this->form["email"];
        $u->tel = $this->form["tel"];
        $u->fixe = $this->form["fixe"];
        $u->sigle = $this->form["sigle"];
        $u->adresse = $this->form["adresse"];
        $u->slogan = $this->form["slogan"];
       
        if ($this->form["image"]) {
            $img_name = uniqid().".jpg";

            $this->form["image"]->storeAs("public/images", $img_name);
            $u->image = $img_name;

        }

        $u->save();
        $this->dispatchBrowserEvent("updateInfo");
    }

    public function render()
    {
        return view('livewire.admin.general', [
            "users" => User::all()
        ])->layout("layouts.dashboard", [
            "shop" => Shop::first()
        ]);
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }else{
            if (!Auth()->user()->isSuperAdmin()) {
                return redirect(route("home"));
            }
        }

        $shop = Shop::first();

        $this->form['nom'] = $shop->nom;
        $this->form['tel'] = $shop->tel;
        $this->form['fixe'] = $shop->fixe;
        $this->form['sigle'] = $shop->sigle;
        $this->form['slogan'] = $shop->slogan;
        $this->form['email'] = $shop->email;
        $this->form['adresse'] = $shop->adresse;
        $this->image = $shop->image;
    }
}
