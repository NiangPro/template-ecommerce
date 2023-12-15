<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Souhait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;


class Visiteurs extends Component
{
    public $favoris = null;
    public $userOrders;
    public $imgEditing = null;
    public $photo;
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
        'password' => "",
        'password_confirmation' => "",
        'current_password' => "",
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
        'form.current_password.required' => "Le mot de passe est requis",
        "form.pseudo.required" => "Le nom d'utilisateur est obligatoire",
        "form.pseudo.unique" => "Le nom d'utilisateur existe dèjà",
        "form.image.image" => "Veillez selectionner une image",
    ];

    
    public function editProfil()
    {
        if ($this->photo) {
            $this->validate([
                'photo' => 'image'
            ]);
            $imageName = 'user'.\md5(Auth::user()->id).'jpg';

            $this->photo->storeAs('public/images', $imageName);

            $user = User::where('id', Auth::user()->id)->first();

            $user->image = $imageName;
            $user->save();

            $this->photo = "";

            $this->dispatchBrowserEvent('profilEditSuccessful');
        }
    }

    public function editPassword(){
        $this->validate([
            'form.current_password' => 'required',
            'form.password' => 'required|string|min:6|confirmed',
        ]);

        if (Auth::check($this->form['current_password'], Auth::user()->password) == 0) {
            $user = User::where('id', Auth::user()->id)->first();

            $user->password = Hash::make($this->form['password']);

            $user->save();

            $this->dispatchBrowserEvent('passwordEditSuccessful');
            $this->init();
        } else {
            $this->dispatchBrowserEvent("passwordNotFound");
        }

    }

    public function init()
    {
        $this->form['current_password'] = "";
        $this->form['password'] = "";
        $this->form['password_confirmation'] = "";
    }


    public function updateClient(){
        $this->validate([
            "form.nom" => "required",
            "form.prenom" => "required",
            "form.adresse" => "required",
            "form.tel" => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
            "form.tel2" => ['nullable', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
            "form.email" => "required",
            "form.pseudo" => "required",
            "form.image" => "nullable|image",
            "form.pays" => "nullable|string",
            "form.nationalite" => "nullable|string",
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
        $this->dispatchBrowserEvent("updateClient");
        // dd($this->form["id"]);
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

    }

    public function render()
    {
        $prodsCart = null;
        $total = 0;
        if (Auth::user()) {
            $prodsCart = Cart::where("user_id", Auth::user()->id)->get();
            foreach ($prodsCart as $c) {
                $total += ($c->product->prix * $c->qte); 
            }
            $this->favoris = Souhait::where("user_id", Auth::user()->id)->get();
        }
        $this->userOrders = auth()->user()->orders()->with('products')->get();

        return view('livewire.frontend.visiteurs',[
            "produits" => Product::orderBy("id", "DESC")->get(),

        ])->layout("layouts.app", [
            "prodsCart" => $prodsCart,
            "total" => $total,
            "category" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get(),
            "product" => Product::orderBy("id", "DESC")->Limit(6)->get(),
            "favoris" => $this->favoris,
            "menupubs" => Publicite::where("type", "mini")->limit(3)->get(),
        ]);
    }

    public function mount(){
        $this->editer(Auth::user()->id);
    }
}
