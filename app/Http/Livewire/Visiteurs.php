<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Visiteurs extends Component
{
    public function render()
    {
        return view('livewire.frontend.visiteurs',[
            "produits" => Product::orderBy("id", "DESC")->get(),

        ])->layout("layouts.app");
    }
}
