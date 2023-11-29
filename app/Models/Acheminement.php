<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acheminement extends Model
{
    use HasFactory;

    protected $table = "acheminements";

    protected $fillable = [
        "nom",
        "nbrejour",
    ];
}
