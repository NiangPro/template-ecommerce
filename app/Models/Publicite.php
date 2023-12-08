<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicite extends Model
{
    use HasFactory;

    protected $table = "publicites";

    protected $fillable = [
        "type",
        "product_id"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}
