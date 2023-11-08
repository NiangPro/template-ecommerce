<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Accueil extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil',[
            "produits" => Product::orderBy("id", "DESC")->Limit(12)->get(),
            'categories' => Category::orderBy("nom", "ASC")->get(),
        ])->layout("layouts.app");
    }
}
