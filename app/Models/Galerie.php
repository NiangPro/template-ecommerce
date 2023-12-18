<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    use HasFactory;

    protected $table = "galeries";

    protected $fillable = [
        "nom",
        "product_id",
    ];

    public function produit()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}
