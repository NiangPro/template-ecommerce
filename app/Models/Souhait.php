<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souhait extends Model
{
    use HasFactory;

    protected $table ="souhaits";
    protected $fillable = [
        "qte",
        "user_id",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function client()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
