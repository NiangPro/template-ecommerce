<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Admins extends Component
{
    use WithFileUploads;

    public $type = "list";
    public $title = "La liste des administrateurs";

    public function changeType($type)
    {
        $this->type = $type;
        if ($this->type == "add") {
            $this->title = "Ajout Administrateur";
        }elseif ($this->type == "edit") {
            $this->title = "Edition Administrateur";
        }else{
            $this->title = "La liste des administrateur";
            $this->initForm();
        }
    }

    public function render()
    {
        return view('livewire.admin.administrateur.admins')->layout("layouts.dashboard");
    }
}
