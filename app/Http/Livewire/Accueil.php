<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Livewire\Component;

class Accueil extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil',[
            'categories' => Category::orderBy("nom", "ASC")->get(),
            "produits" => Product::orderBy("id", "DESC")->get(),
            "produitSlider" => Product::orderBy("id", "DESC")->Limit(4)->get(),
            "CategorieSlider" => Category::orderBy("id", "DESC")->Limit(4)->get(),
        ])->layout("layouts.app");
    }
}
