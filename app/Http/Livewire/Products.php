<?php

namespace App\Http\Livewire;

use App\Models\Acheminement;
use App\Models\Category;
use App\Models\Galerie;
use App\Models\Product;
use App\Models\Publicite;
use App\Models\Shop;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{

    use WithFileUploads;

    public $type = "list";
    public $title = "La liste des produits";
    public $imgEditing = null;
    public $imgGalerie = [];
    public $idDeleting = null;
    public $idproductGal;
    public $showPays = 0;
    public $form = [
        "nom",
        "id" => null,
        "category_id"=> null, 
        "acheminement_id"=> null, 
        "description",
        "prix" => 0,
        "qte" => 0,
        "poids" => 0,
        "type" => 0,
        "reduction" => 0,
        "image" => null,
        "tags" => [],
        "supplementaire"=>null,
        "galeries" =>[],
    ];

    protected $rules = [
        "form.nom" => "required",
        "form.category_id" => "required",
        "form.description" => "required",
        "form.prix" => "required|integer",
        "form.reduction" => "required|integer",
        "form.qte" => "required|integer",
        "form.image" => "required|image",
        "form.supplementaire" => "nullable|string",
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

    public function afficherPays(){
        $this->showPays = $this->form["type"] == 0 ? 0: 1;
    }
    public function removeGalerie($idGalerie){
        $g = Galerie::where("id", $idGalerie)->first();

        $g->delete();

        $this->dispatchBrowserEvent("deleteImageGalerie");
        $this->imgGalerie = Galerie::where("product_id", $this->idproductGal)->get();
    }

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

    public function publicite($id)
    {
        $pub = Publicite::where("product_id", $id)->first();

        if (!$pub) {
            Publicite::create([
                "type" => "mini",
                "product_id" => $id
            ]);

            $this->dispatchBrowserEvent("addPub");
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
        $this->form["supplementaire"] = $c->supplementaire;;
        $this->form["qte"] = $c->qte;
        $this->form["category_id"] = $c->category_id;
        $this->form["acheminement_id"] = $c->acheminement_id;
        $this->form["prix"] = $c->prix;
        $this->form["type"] = $c->type;
        $this->form["reduction"] = $c->reduction;
        $this->form["tags"] = $c->tags->pluck('id')->toArray();
        $this->imgEditing = $c->image;
        $this->imgGalerie = Galerie::where("product_id", $c->id)->get();
        $this->idproductGal=$c->id;

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

            if($this->form["reduction"] >= $this->form["prix"]){
                $this->dispatchBrowserEvent("overReduction");
            }else if($this->form["type"] == 1 && !$this->form["acheminement_id"]){
                $this->dispatchBrowserEvent("noPays");
            }else{
                $p = Product::where("id", $this->form["id"])->first();

                $p->nom = ucfirst($this->form["nom"]);
                $p->category_id = $this->form["category_id"];
                $p->description = $this->form["description"];
                $p->prix = $this->form["prix"];
                $p->qte = $this->form["qte"];
                $p->poids = $this->form["poids"];
                $p->type = $this->form["type"];
                $p->acheminement_id = $this->form["acheminement_id"];
                $p->reduction = $this->form["reduction"];
                $p->supplementaire = $this->form["supplementaire"];

                if ($this->form["image"]) {
                    $img_name = uniqid().".jpg";

                    $this->form["image"]->storeAs("public/images", $img_name);
                    $p->image = $img_name;

                }

                $p->save();

                $p->tags()->sync($this->form["tags"]);
                $g= new Galerie();
            
                if($this->form["galeries"]){
                    foreach($this->form["galeries"] as $img){
                        $img_name = uniqid().".jpg";
                        $img->storeAs("public/images", $img_name);
                        Galerie::create([
                            "nom" => $img_name,
                            "product_id" => $p->id,
                        ]);
                    }
                }
                $this->dispatchBrowserEvent("updateProduct");
                $this->changeType("list");
            }
        }else{
            $this->validate();
            if($this->form["reduction"] >= $this->form["prix"]){
                $this->dispatchBrowserEvent("overReduction");
            }else if($this->form["type"] == 1 && !$this->form["acheminement_id"]){
                $this->dispatchBrowserEvent("noPays");
            }else{
                $img_name = uniqid().".jpg";

                $this->form["image"]->storeAs("public/images", $img_name);

                $p = new Product();

                $p->nom = $this->form["nom"];
                $p->description = $this->form["description"];
                $p->prix = $this->form["prix"];
                $p->qte = $this->form["qte"];
                $p->type = $this->form["type"];
                $p->acheminement_id = $this->form["acheminement_id"];
                $p->reduction = $this->form["reduction"];
                $p->category_id = $this->form["category_id"];
                $p->image = $img_name;
                $p->supplementaire = $this->form["supplementaire"];

                $p->save();

                if ($this->form["tags"]) {
                    $p->tags()->attach($this->form["tags"]);
                }

                $this->dispatchBrowserEvent("addProduct");
                $this->changeType("list");
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.produit.products', [
            'categories' => Category::orderBy("nom", "ASC")->get(),
            'tags' => Tag::all(),
            'pays' => Acheminement::orderBy("pays", "ASC")->get(),
            "produits" => Product::orderBy("id", "DESC")->get()
        ])->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
    }

    public function initForm()
    {
        $this->form["id"] = null;
        $this->form["category_id"] = null;
        $this->form["nom"] = "";
        $this->form["description"] = "";
        $this->form["image"] = null;
        $this->form["galeries"] = [];
        $this->form["prix"] = 0;
        $this->form["qte"] = 0;
        $this->form["poids"] = 0;
        $this->form["reduction"] = 0;
        $this->form["tags"] = [];
        $this->form["supplementaire"]="";

        $this->idDeleting = null;
        $this->imgEditing = null;
        $this->imgGalerie = [];
    }
   
    public function mount()
    {
        if (!Auth()->user() || !Auth()->user()->isAdmin()) {
            return redirect(route("accueil"));
        }
    }
}
