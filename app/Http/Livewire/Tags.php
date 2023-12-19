<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tags extends Component
{
    public $type = "list";
    public $idDeleting = null;
    public $title = "liste des tags produits";
    public $form = [
        "nom" => "",
        "id" => null
    ];

    protected $rules = [
        "form.nom" => "required"
    ];

    public $messages = [
        "form.nom.required" => "Le nom est requis"
    ];

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout tag";
        }elseif ($this->type == "edit") {
            $this->title = "Edition tag";
        }else{
            $this->title = "La liste des tags produits";
            $this->initForm();
        }
    }

    public function editer($id)
    {
        $t = Tag::where("id", $id)->first();

        $this->form["id"] = $t->id;
        $this->form["nom"] = $t->nom;

        $this->changeType("edit");
    }

    public function store()
    {
        $this->validate();

        if ($this->form["id"]) {
            $t = Tag::where("id", $this->form["id"])->first();

            $t->nom = $this->form["nom"];
            $t->save();

            $this->dispatchBrowserEvent("updateTag");
        }else{
            Tag::create([
                "nom" => $this->form["nom"]
            ]);

            $this->dispatchBrowserEvent("addTag");
        }

        $this->changeType("list");
    }

    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $cat = Tag::where("id", $this->idDeleting)->first();

        $cat->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deleteTag");
    }


    public function render()
    {
        return view('livewire.admin.tag.tags', [
            "tags" => Tag::orderBy("id", "DESC")->get()
        ])->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }

    public function initForm()
    {
        $this->form["nom"] = "";
        $this->form["id"] = null;

        $this->idDeleting = null;
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
