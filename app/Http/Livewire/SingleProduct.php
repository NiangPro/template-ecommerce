<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $idProduit = null;
    public function render()
    {
        return view('livewire.frontend.single-product',[
            "product" => Product::where("id", $this->idProduit)->first(),
            "produits" => Product::orderBy("id", "DESC")->get(),
        ])->layout("layouts.app");
    }

    public function mount($id)
    {
        $this->idProduit = $id;
    }
}
