<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ArchiveProduct extends Component
{
    public $idCategory;
    public function render()
    {
        return view('livewire.frontend.archive-product',[
            "produits" => Product::where("category_id", $this->idCategory)->orderBy("id", "DESC")->get(),

        ])->layout("layouts.app");
    }

    public function mount($slug, $id)
    {
        $this->idCategory = $id;
    }
}
