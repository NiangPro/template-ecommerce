<?php

namespace App\Http\Livewire;

use App\Models\Acheminement as ModelsAcheminement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Acheminement extends Component
{
    public $type = "list";
    public $idDeleting = null;
    public $imgEditing = null;
    public $title = "La liste des modes d'acheminement";

    public $form = [
        "nom" => "",
        "id" => null,
        "nbrejour"=>0,
        "prix"=>0,
    ];

    protected $rules = [
        "form.nom" => "required",
        "form.nbrejour" => "required",
    ];

    protected $messages = [
        "form.nom.required" => "Le nom est obligatoire",
        "form.nbrejour.required" => "Le nombre de jour est obligatoire",
    ];

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout mode d'acheminement";
        }elseif ($this->type == "edit") {
            $this->title = "Edition mode d'acheminement";
        }else{
            $this->title = "La liste des modes d'acheminement";
            $this->initForm();
        }
    }

    public function editer($id)
    {
        $c = ModelsAcheminement::where("id", $id)->first();

        $this->form["nom"] = $c->nom;
        $this->form["id"] = $c->id;
        $this->form["nbrejour"] = $c->nbrejour;
        $this->form["prix"] = $c->prix;

        $this->changeType("edit");
    }

    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $cat = ModelsAcheminement::where("id", $this->idDeleting)->first();

        $cat->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deleteAcheminement");
    }

    public function store()
    {
        $this->validate();

        if ($this->form["id"]) {
            $cat = ModelsAcheminement::where("id", $this->form["id"])->first();

            $cat->nom = ucfirst($this->form["nom"]);
            $cat->nbrejour = $this->form["nbrejour"];
            $cat->prix = $this->form["prix"];


            $cat->save();
            $this->dispatchBrowserEvent("updateAcheminement");

        }else{

            ModelsAcheminement::create([
                "nom" => ucfirst($this->form["nom"]) ,
                "nbrejour" => $this->form["nbrejour"],
                "prix" => $this->form["prix"],
            ]);
    
            $this->dispatchBrowserEvent("addAcheminement");
        }

        $this->changeType("list");
    }

    public function render()
    {
        return view('livewire.admin.acheminement.acheminement',[
            "aches" => ModelsAcheminement::orderBy("nom", "ASC")->get()
        ])->layout("layouts.dashboard");
    }

    protected function initForm()
    {
        $this->form["id"] = null;
        $this->form["nom"] = "";
        $this->form["nbrejour"] = 0;
        $this->form["prix"] = 0;
        $this->idDeleting = null;
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
