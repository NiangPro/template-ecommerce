<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglage extends Model
{
    use HasFactory;

    public function createFirstAdmin()
    {
        $admin = User::where("role", "admin")->first();

        if(!$admin){
            User::create([
                "prenom" => 'Bassirou',
                "nom" => 'Niang',
                "adresse" => 'Golf sud',
                "pays" => 'Senegal',
                "tel2" =>  NULL,
                "pseudo" => 'makhfuz', 
                "email" => 'makhfuz@gmail.com', 
                "nationalite" => 'Senegalaise', 
                "tel" => '783123657', 
                "role" => 'admin', 
                "image" => 'profil.png', 
                "password" => '$2y$10$k6MuUBF/eb7cpbEv5QVqKuRNFw1Y71xtIT7rRlJn3aq5DbFEKvWKy'
            ]);
        }
    }
}
