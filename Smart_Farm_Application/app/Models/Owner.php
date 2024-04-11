<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        "cf",
        "nome",
        "cognome",
        "data_nascita",
        "luogo_nascita",
        "telefono",
        "mail",
        "via",
        "civico",
        "citta",
        "cap"
    ];

    protected $casts = [
        'data_nascita' => 'date',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

}
