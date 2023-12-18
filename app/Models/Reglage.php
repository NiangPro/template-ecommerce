<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglage extends Model
{
    use HasFactory;

    public function createFirstAdmin()
    {
        $admin = User::where("role", "superadmin")->first();

        if(!$admin){
            User::create([
                "prenom" => 'Modou',
                "nom" => 'Mar',
                "adresse" => 'Golf sud',
                "pays" => 'Senegal',
                "tel2" =>  NULL,
                "pseudo" => 'makhfuz', 
                "email" => 'makhfuzmar@gmail.com', 
                "nationalite" => 'Senegalaise', 
                "tel" => '783123657', 
                "role" => 'superadmin', 
                "image" => 'profil.png', 
                "password" => '$2y$10$k6MuUBF/eb7cpbEv5QVqKuRNFw1Y71xtIT7rRlJn3aq5DbFEKvWKy'
            ]);
        }
    }

    public function createShop()
    {
        $shop = Shop::first();

        if (!$shop) {
            Shop::create([
                "nom" => "SunuMarketBusiness",
                "sigle" => "SMB",
                "tel" => "777283722",
                "fixe" => "338675942",
                "adresse" => "",
                "email" => "support@sunumaketbusiness.com",
                "image" => "smb.png",
                "slogan" => "La solution facile.",
            ]);
        }
    }

    public function createFirstClientDemo()
    {
        $client = User::where("role", "admin")->first();

        if(!$client){
            User::create([
                "prenom" => 'Alioune',
                "nom" => 'Fall',
                "adresse" => 'Sangalkam',
                "pays" => 'Senegal',
                "tel2" =>  NULL,
                "pseudo" => 'alioune', 
                "email" => 'demo@gmail.com', 
                "nationalite" => 'Senegalaise', 
                "tel" => '783123657', 
                "role" => 'admin', 
                "image" => 'profil.png', 
                "password" => '$2y$10$k6MuUBF/eb7cpbEv5QVqKuRNFw1Y71xtIT7rRlJn3aq5DbFEKvWKy'
            ]);
        }
    }
}
