<?php

namespace App\Http\Livewire;

use App\Models\Acheminement as ModelsAcheminement;
use App\Models\Shop;
use Livewire\Component;

class Acheminement extends Component
{
    public $type = "list";
    public $idDeleting = null;
    public $imgEditing = null;
    public $title = "La liste des modes d'acheminement";

    public $form = [
        "pays" => "",
        "id" => null,
        "nbrejour_bateau"=>0,
        "prix_bateau"=>0,
        "nbrejour_avion"=>0,
        "prix_avion"=>0,
    ];

    protected $rules = [
        "form.pays" => "required",
    ];

    protected $messages = [
        "form.pays.required" => "Le pays est obligatoire",
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

        $this->form["pays"] = $c->pays;
        $this->form["id"] = $c->id;
        $this->form["nbrejour_avion"] = $c->nbrejour_avion;
        $this->form["prix_avion"] = $c->prix_avion;
        $this->form["nbrejour_bateau"] = $c->nbrejour_bateau;
        $this->form["prix_bateau"] = $c->prix_bateau;

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

            $cat->pays = ucfirst($this->form["pays"]);
            $cat->nbrejour_avion = $this->form["nbrejour_avion"];
            $cat->prix_avion = $this->form["prix_avion"];
            $cat->nbrejour_bateau = $this->form["nbrejour_bateau"];
            $cat->prix_bateau = $this->form["prix_bateau"];


            $cat->save();
            $this->dispatchBrowserEvent("updateAcheminement");

        }else{

            ModelsAcheminement::create([
                "pays" => ucfirst($this->form["pays"]) ,
                "nbrejour_bateau" => $this->form["nbrejour_bateau"],
                "prix_bateau" => $this->form["prix_bateau"],
                "nbrejour_avion" => $this->form["nbrejour_avion"],
                "prix_avion" => $this->form["prix_avion"],
            ]);
    
            $this->dispatchBrowserEvent("addAcheminement");
        }

        $this->changeType("list");
    }

    public function render()
    {
        return view('livewire.admin.acheminement.acheminement',[
            "aches" => ModelsAcheminement::orderBy("pays", "ASC")->get()
        ])->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }

    protected function initForm()
    {
        $this->form["id"] = null;
        $this->form["pays"] = "";
        $this->form["nbrejour_bateau"] = 0;
        $this->form["prix_bateau"] = 0;
        $this->form["nbrejour_avion"] = 0;
        $this->form["prix_avion"] = 0;
        $this->idDeleting = null;
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
