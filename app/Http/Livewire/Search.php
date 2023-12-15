<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $nom = "";
    public $products = null;

    public function rechercher()
    {
        if ($this->nom) {
            $this->products = Product::where('nom', 'like', "%$this->nom%")->get();
        }
    }
    public function render()
    {
        return view('livewire.search');
    }
}
