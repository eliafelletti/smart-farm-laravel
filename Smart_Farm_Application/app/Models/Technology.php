<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupplierCompany;
use App\Models\RealizedMeasure;
use App\Models\UsedTechnology;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "tipologia",
        "id_azienda_fornitrice"
    ]; 

    protected $casts = [
        "created_at" => "datetime:Y-m-d",
        "updated_at" => "datetime:Y-m-d"
    ];

    public function azienda_fornitrice() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(SupplierCompany::class, 'id_azienda_fornitrice', 'id');
    }

    public function misure_realizzate() : HasMany
    {
        return ($this)->hasMany(RealizedMeasure::class);
    }

    public function tecnologie_utilizzate() : HasMany
    {
        return ($this)->hasMany(UsedTechnology::class);
    }

}
