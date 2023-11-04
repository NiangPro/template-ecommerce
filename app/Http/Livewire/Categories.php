<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $type = "list";
    public $title = "La liste des categories";

    public $form = [
        "nom",
        "id" => null,
        "parent_id"=> null, 
        "slug"
    ];

    protected $rules = [
        "form.nom" => "required",
    ];

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout Catégorie";
        }elseif ($this->type == "edit") {
            $this->title = "Edition catégorie";
        }else{
            $this->title = "La liste des categories";
            $this->initForm();
        }
    }

    
    public function createSlug($nom)
    {
        return implode( "_", explode(" ", $nom));
    }

    public function editer($id)
    {
        $c = Category::where("id", $id)->first();

        $this->form["nom"] = $c->nom;
        $this->form["id"] = $c->id;

        $this->changeType("edit");
    }

    public function store()
    {
        $this->validate();

        Category::create([
            "nom" => $this->form["nom"],
            "parent_id" => $this->form["parent_id"] ?:null,
            "slug" => $this->createSlug($this->form["nom"])
        ]);

        $this->dispatchBrowserEvent("addCategory");
        $this->changeType("list");
    }
    public function render()
    {
        return view('livewire.admin.category.categories', [
            "categories" => Category::orderBy("nom", "ASC")->get()
        ])->layout("layouts.dashboard");
    }

    protected function initForm()
    {
        $this->form["id"] = null;
        $this->form["nom"] = "";
    }
}
