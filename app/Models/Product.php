<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isTrue;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        "nom",
        "description",
        "prix",
        "qte",
        "poids",
        "reduction",
        "supplementaire",
        "image",
        "type",
        "category_id",
        "acheminement_id"
    ];

    public function souhait()
    {
        return $this->hasMany(Souhait::class);
    }

    public function images()
    {
        return $this->hasMany(Galerie::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function acheminement()
    {
        return $this->belongsTo(Acheminement::class, "acheminement_id");
    }

    public function publicite()
    {
        return $this->hasOne(Publicite::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }
}
