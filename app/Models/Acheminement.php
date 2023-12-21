<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acheminement extends Model
{
    use HasFactory;

    protected $table = "acheminements";

    protected $fillable = [
        "pays",
        "nbrejour_avion",
        "nbrejour_bateau",
        "prix_avion",
        "prix_bateau",
    ];

    public function produits()
    {
        return $this->hasMany(Product::class);
    }
}
