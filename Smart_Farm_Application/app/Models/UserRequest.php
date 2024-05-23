<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Owner;
use App\Models\SupplierCompany;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "tipologia_mittente",
        "descrizione",
        "data",
        "completata",
        "id_proprietario",
        "id_azienda_fornitrice",
    ];

    protected $casts = [
        "data" => "date:Y-m-d",
        "created_at" => "datetime:Y-m-d",
        "updated_at" => "datetime:Y-m-d"
    ];

    public function proprietario() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(Owner::class, 'id_proprietario', 'id');
    }

    public function azienda_fornitrice() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(SupplierCompany::class, 'id_azienda_fornitrice', 'id');
    }

}
