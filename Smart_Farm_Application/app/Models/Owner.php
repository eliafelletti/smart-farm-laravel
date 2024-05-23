<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\SmartFarm;
use App\Models\RealizedCrop;
use App\Models\UserRequest;

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

    public function detiene() : HasOne
    {
        //(Model_di_riferimento)
        return ($this)->hasOne(SmartFarm::class);
    }

    public function realizedCrops(): HasMany
    {
        return $this->hasMany(RealizedCrop::class);
    }

    public function richieste() : HasMany
    {
        return $this->hasMany(UserRequest::class);
    }

}
