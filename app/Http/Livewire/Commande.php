<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class Commande extends Component
{
    public $orders;
    public function render()
    {
        $this->orders = Order::orderBy("id", "DESC")->get();
        return view('livewire.admin.commande')->layout("layouts.dashboard");
    }
}
