<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\GreenHouse;

class Measure extends Model
{
    use HasFactory;

    protected $fillable = [
        "timestamp",
        "temperatura",
        "umidita",
        "co2",
        "irrigazione",
        "luminosita",
        "id_serra"
    ]; 

    protected $casts = [
        "timestamp" => "datetime:Y-m-d",
        "created_at" => "datetime:Y-m-d",
        "updated_at" => "datetime:Y-m-d"
    ];

    public function serra() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(GreenHouse::class, 'id_serra', 'id');
    }

}
