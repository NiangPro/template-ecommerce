<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Shop;
use Livewire\Component;

class Commande extends Component
{
    public $orders;
    public $shop;
    public $com;
    public $title = "Liste des dernières commandes";

    public $etat = "list";

    public function changeType($type)
    {
        $this->etat = $type;
        $this->title = "Liste des dernières commandes";
    }

    public function valider($id)
    {
        $c = Order::where("id", $id)->first();

        $c->statut = 1;
        $c->save();

        $this->dispatchBrowserEvent("validOrder");
    }

    public function rejeter($id)
    {
        $c = Order::where("id", $id)->first();

        $c->statut = 0;
        $c->save();

        $this->dispatchBrowserEvent("rejectOrder");
    }

    public function showFacture($id)
    {
        $c = Order::where("id", $id)->first();

        $this->com = $c;

        $this->etat = "show";
        $this->title = "Les informations de la commande de ".$c->user->prenom." ".$c->user->nom;
    }
    public function render()
    {
        $this->orders = Order::orderBy("id", "DESC")->get();
        $this->shop =  Shop::first();
        return view('livewire.admin.commande.commande')->layout("layouts.dashboard",[
            "shop" =>$this->shop
        ]);
    }
}
