<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartFarm extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "dimensione",
        "telefono",
        "mail",
        "via",
        "civico",
        "citta",
        "cap"
    ];  

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
}
