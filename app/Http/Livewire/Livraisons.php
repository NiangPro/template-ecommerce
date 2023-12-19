<?php

namespace App\Http\Livewire;

use App\Models\Livraison;
use App\Models\Shop;
use Livewire\Component;

class Livraisons extends Component
{
    public $type = "list";
    public $idDeleting = null;
    public $imgEditing = null;
    public $title = "La liste des modes d'acheminement";

    public $form = [
        "lieu" => "",
        "id" => null,
        "prix"=>0,
    ];

    protected $rules = [
        "form.lieu" => "required",
        "form.prix" => "required",
    ];

    protected $messages = [
        "form.lieu.required" => "Le lieu est obligatoire",
        "form.prix.required" => "Le prix est obligatoire",
    ];

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout Lieu de livraison";
        }elseif ($this->type == "edit") {
            $this->title = "Edition de lieu de livraison";
        }else{
            $this->title = "La liste des lieux de livraison";
            $this->initForm();
        }
    }

    public function editer($id)
    {
        $c = Livraison::where("id", $id)->first();

        $this->form["lieu"] = $c->lieu;
        $this->form["id"] = $c->id;
        $this->form["prix"] = $c->prix;

        $this->changeType("edit");
    }

    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $cat = Livraison::where("id", $this->idDeleting)->first();

        $cat->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deleteLivraison");
    }

    public function store()
    {
        $this->validate();

        if ($this->form["id"]) {
            $cat = Livraison::where("id", $this->form["id"])->first();

            $cat->lieu = ucfirst($this->form["lieu"]);
            $cat->prix = $this->form["prix"];


            $cat->save();
            $this->dispatchBrowserEvent("updateLivraison");

        }else{

            Livraison::create([
                "lieu" => ucfirst($this->form["lieu"]) ,
                "prix" => $this->form["prix"],
            ]);
    
            $this->dispatchBrowserEvent("addLivraison");
        }

        $this->changeType("list");
    }
    public function render()
    {
        return view('livewire.admin.livraison.livraisons',[
            "livraisons" => Livraison::orderBy("lieu", "ASC")->get()
        ])->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }

    protected function initForm()
    {
        $this->form["id"] = null;
        $this->form["lieu"] = "";
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
