<?php

namespace App\Http\Livewire;

use App\Models\Partener;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Partenaires extends Component
{
    use WithFileUploads;

    public $type = "list";
    public $title = "La liste des partenaires";
    public $imgEditing = null;
    public $idDeleting = null;

    public $form = [
        "nom",
        "id" => null,
        "image" => null,
    ];

    protected $rules = [
        "form.nom" => "required",
        "form.image" => "required|image",
    ];

    protected $messages = [
        "form.nom.required" => "Le nom est obligatoire",
        "form.image.required" => "L'image est obligatoire",
        "form.image.image" => "Veuillez selectionner une image",
    ];

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout Partenaire";
        }elseif ($this->type == "edit") {
            $this->title = "Edition Partenaire";
        }else{
            $this->title = "La liste des partenaires";
            $this->initForm();
        }
    }

    public function editer(Partener $c)
    {
        $this->form["nom"] = $c->nom;
        $this->form["id"] = $c->id;
        
        $this->imgEditing = $c->image;

        $this->changeType("edit");
    }

    public function store()
    {
        if ($this->form["id"]) {
            $this->validate(["form.nom" => "required"]);

            $p = Partener::where("id", $this->form["id"])->first();

            $p->nom = ucfirst($this->form["nom"]);

            if ($this->form["image"]) {
                $img_name = uniqid().".jpg";

                $this->form["image"]->storeAs("public/images", $img_name);
                $p->image = $img_name;

            }

            $p->save();

            $this->dispatchBrowserEvent("updatePartener");

        }else{
            $this->validate();
            $img_name = uniqid().".jpg";

            $this->form["image"]->storeAs("public/images", $img_name);

            $p = new Partener();

            $p->nom = $this->form["nom"];
            $p->image = $img_name;

            $p->save();
            $this->dispatchBrowserEvent("addPartener");
        }
        $this->changeType("list");
    }

    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $p = Partener::where("id", $this->idDeleting)->first();

        $p->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deletePartener");
    }

    public function render()
    {
        return view('livewire.admin.partenaire.partenaires', [
            "parteners" => Partener::orderBy("nom", "ASC")->get()
        ])->layout("layouts.dashboard");
    }

    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }

    public function initForm()
    {
        $this->form["id"] = null;
        $this->form["nom"] = "";
        $this->form["image"] = null;
      
        $this->idDeleting = null;
        $this->imgEditing = null;
    }
}
