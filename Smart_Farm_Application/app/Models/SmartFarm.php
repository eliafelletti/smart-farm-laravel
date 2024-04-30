<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Owner;
use App\Models\GreenHouse;
use App\Models\UsedTechnology;

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
        "cap",
        "id_proprietario"
    ];  

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function proprietario() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(Owner::class, 'id_proprietario', 'id');
    }

    public function serre() : HasMany
    {
        return ($this)->hasMany(GreenHouse::class);
    }

    public function tecnologie_utilizzate() : HasMany
    {
        return ($this)->hasMany(UsedTechnology::class);
    }

}
