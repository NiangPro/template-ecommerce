<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use WithFileUploads;

    public $type = "list";
    public $idDeleting = null;
    public $imgEditing = null;
    public $title = "La liste des categories";

    public $form = [
        "nom",
        "id" => null,
        "parent_id"=> null, 
        "image"=> null, 
        "slug"
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
        return strtolower(implode( "_", explode(" ", $nom)));
    }

    public function editer($id)
    {
        $c = Category::where("id", $id)->first();

        $this->form["nom"] = $c->nom;
        $this->form["id"] = $c->id;
        $this->form["slug"] = $c->slug;
        $this->imgEditing = $c->image;
        $this->form["parent_id"] = $c->parent_id;

        $this->changeType("edit");
    }

    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $cat = Category::where("id", $this->idDeleting)->first();

        $cat->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deleteCategory");
    }

    public function store()
    {

        if ($this->form["id"]) {
            $this->validate(["form.nom" => "required"]);
            $cat = Category::where("id", $this->form["id"])->first();

            $cat->nom = ucfirst($this->form["nom"]);
            $cat->parent_id = $this->form["parent_id"] ?:null;
            $cat->slug = $this->createSlug($this->form["nom"]);

            if ($this->form["image"]) {
                $img_name = uniqid().".jpg";

                $this->form["image"]->storeAs("public/images", $img_name);
                $cat->image = $img_name;

            }

            $cat->save();
            $this->dispatchBrowserEvent("updateCategory");

        }else{
            $this->validate();

            $img_name = uniqid().".jpg";

            $this->form["image"]->storeAs("public/images", $img_name);

            Category::create([
                "nom" => ucfirst($this->form["nom"]) ,
                "image" => $img_name,
                "parent_id" => $this->form["parent_id"] ?:null,
                "slug" => $this->createSlug($this->form["nom"])
            ]);
    
            $this->dispatchBrowserEvent("addCategory");
        }

        $this->changeType("list");
    }
    public function render()
    {
        return view('livewire.admin.category.categories', [
            "categories" => Category::orderBy("nom", "ASC")->where("parent_id", null)->get()
        ])->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }

    protected function initForm()
    {
        $this->form["id"] = null;
        $this->form["nom"] = "";
        $this->form["image"] = "";
        $this->form["slug"] = "";
        $this->form["parent_id"] = null;
        $this->idDeleting = null;
    }

    
    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
