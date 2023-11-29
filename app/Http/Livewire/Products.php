<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{

    use WithFileUploads;

    public $type = "list";
    public $title = "La liste des produits";
    public $imgEditing = null;
    public $idDeleting = null;

    public $form = [
        "nom",
        "id" => null,
        "category_id"=> null, 
        "description",
        "prix" => 0,
        "qte" => 0,
        "reduction" => 0,
        "image" => null,
        "tags" => []
    ];

    protected $rules = [
        "form.nom" => "required",
        "form.category_id" => "required",
        "form.description" => "required",
        "form.prix" => "required|integer",
        "form.reduction" => "required|integer",
        "form.qte" => "required|integer",
        "form.image" => "required|image",
    ];

    protected $messages = [
        "form.nom.required" => "Le nom est obligatoire",
        "form.category_id.required" => "La catégorie est obligatoire",
        "form.prix.required" => "Le prix est obligatoire",
        "form.qte.required" => "La quantité est obligatoire",
        "form.reduction.required" => "Le prix de réduction est obligatoire",
        "form.reduction.integer" => "Le prix de réduction est de type entier",
        "form.prix.integer" => "Le prix est de type entier",
        "form.qte.integer" => "La quantité est de type entier",
        "form.description.required" => "La description est obligatoire",
        "form.image.required" => "L'image est obligatoire",
        "form.image.image" => "Veuillez selectionner une image",
    ];

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout Produit";
        }elseif ($this->type == "edit") {
            $this->title = "Edition produit";
        }else{
            $this->title = "La liste des produits";
            $this->initForm();
        }
    }
    
    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $p = Product::where("id", $this->idDeleting)->first();

        $p->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deleteProduct");
    }

    public function editer($id)
    {
        $c = Product::where("id", $id)->first();

        $this->form["nom"] = $c->nom;
        $this->form["id"] = $c->id;
        $this->form["description"] = $c->description;
        $this->form["qte"] = $c->qte;
        $this->form["category_id"] = $c->category_id;
        $this->form["prix"] = $c->prix;
        $this->form["tags"] = $c->tags;
        $this->imgEditing = $c->image;

        $this->changeType("edit");
    }
    
    public function store()
    {
        if ($this->form["id"]) {
            $this->validate(["form.nom" => "required",
            "form.category_id" => "required",
            "form.description" => "required",
            "form.prix" => "required|integer",
            "form.reduction" => "required|integer",
            "form.qte" => "required|integer"]);

            $p = Product::where("id", $this->form["id"])->first();

            $p->nom = ucfirst($this->form["nom"]);
            $p->category_id = $this->form["category_id"];
            $p->description = $this->form["description"];
            $p->prix = $this->form["prix"];
            $p->qte = $this->form["qte"];
            $p->reduction = $this->form["reduction"];

            if ($this->form["image"]) {
                $img_name = uniqid().".jpg";

                $this->form["image"]->storeAs("public/images", $img_name);
                $p->image = $img_name;

            }

            $p->save();

            foreach ($p->tags as $t) {
                $p->tags()->detach($t->id);
            }
            
            if ($this->form["tags"]) {
                foreach ($this->form["tags"] as $value) {
                    if ($value) {
                        $p->tags()->attach($value);
                    }
                }
            }
            $this->dispatchBrowserEvent("updateProduct");

        }else{
            $this->validate();
            $img_name = uniqid().".jpg";

            $this->form["image"]->storeAs("public/images", $img_name);

            $p = new Product();

            $p->nom = $this->form["nom"];
            $p->description = $this->form["description"];
            $p->prix = $this->form["prix"];
            $p->qte = $this->form["qte"];
            $p->reduction = $this->form["reduction"];
            $p->category_id = $this->form["category_id"];
            $p->image = $img_name;

            $p->save();

            if ($this->form["tags"]) {
                $p->tags()->attach($this->form["tags"]);
            }

            $this->dispatchBrowserEvent("addProduct");
        }
        $this->changeType("list");
    }

    public function render()
    {
        return view('livewire.admin.produit.products', [
            'categories' => Category::orderBy("nom", "ASC")->get(),
            'tags' => Tag::orderBy("nom", "ASC")->get(),
            "produits" => Product::orderBy("id", "DESC")->get()
        ])->layout("layouts.dashboard");
    }

    public function initForm()
    {
        $this->form["id"] = null;
        $this->form["category_id"] = null;
        $this->form["nom"] = "";
        $this->form["description"] = "";
        $this->form["image"] = null;
        $this->form["prix"] = 0;
        $this->form["qte"] = 0;
        $this->form["reduction"] = 0;
        $this->form["tags"] = [];

        $this->idDeleting = null;
        $this->imgEditing = null;
    }
   
    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
