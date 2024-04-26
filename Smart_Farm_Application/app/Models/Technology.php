<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupplierCompany;
use App\Models\Measure;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function misure() : BelongsToMany
    {
        return ($this)->belongsToMany(Measure::class, 'realized_measures', 'id_tecnologia', 'id_misura');
    }

}
