<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "mail",
        "telefono",
        "fax",
        "via",
        "civico",
        "citta",
        "cap"
    ]; 

    protected $casts = [
        "created_at" => "datetime:Y-m-d",
        "updated_at" => "datetime:Y-m-d"
    ];

    public function tecnologie() : HasMany
    {
        return ($this)->hasMany(Technology::class);
    }

}
