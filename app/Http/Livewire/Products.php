<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
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
        "status" => []
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
        $this->imgEditing = $c->image;

        $this->changeType("edit");
    }
    
    public function store()
    {
        dd($this->form["status"]);
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
            $this->dispatchBrowserEvent("updateProduct");

        }else{
            $this->validate();
            $img_name = uniqid().".jpg";

            $this->form["image"]->storeAs("public/images", $img_name);

            Product::create([
                "nom" => $this->form["nom"],
                "description" => $this->form["description"],
                "prix" => $this->form["prix"],
                "qte" => $this->form["qte"],
                "reduction" => $this->form["reduction"],
                "category_id" => $this->form["category_id"],
                "image" => $img_name,
            ]);

            $this->dispatchBrowserEvent("addProduct");
        }
        $this->changeType("list");
    }

    public function render()
    {
        return view('livewire.admin.produit.products', [
            'categories' => Category::orderBy("nom", "ASC")->get(),
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

        $this->idDeleting = null;
    }
    public function updatedSelectedStatus()
    {
        $this->emit('select2Updated');
    }
}
