<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Publicite;
use App\Models\Shop;
use Livewire\Component;

class Publicity extends Component
{
    public $type = "list";
    public $idDeleting = null;
    public $title = "La liste des produits publicitaires";

    public $form = [
        "id" => null,
        "type" => "",
        "product_id" => null
    ];


    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout Produit Publicitaire";
        }elseif ($this->type == "edit") {
            $this->title = "Edition Produit Publicitaire";
        }else{
            $this->title = "La liste des Produits Publicitaires";
            $this->initForm();
        }
    }

    public function editer($id){

        $pub = Publicite::where("id", $id)->first();
        $this->form["id"] = $pub->id;
        $this->form["type"] = $pub->type;
        $this->form["product_id"] = $pub->product_id;

        $this->changeType("edit");
    }

    public function store()
    {
        $this->validate([
            "form.type" => "required"
        ]);

        $pub = Publicite::where("id", $this->form["id"])->first();

        $pub->type = $this->form["type"];

        $pub->save();

        $this->dispatchBrowserEvent("updatePub");
        $this->changeType("list");
    }

    public function readyForDelete($id)
    {
        $this->idDeleting = $id;
    }

    public function delete()
    {
        $p = Publicite::where("id", $this->idDeleting)->first();

        $p->delete();

        $this->initForm();

        $this->dispatchBrowserEvent("deletePub");
    }

    public function render()
    {
        return view('livewire.admin.publicity.publicity', [
            "produits" => Publicite::orderBy("id", "DESC")->get(),
            "prods" => Product::orderBy("id", "DESC")->get(),
        ])->layout("layouts.dashboard",[
            "shop" => Shop::first()
        ]);
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
        $this->form["type"] = "";
        $this->form["product_id"] = null;
        $this->idDeleting = null;
    }
}
