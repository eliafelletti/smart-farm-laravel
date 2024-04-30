<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RealizedCrop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proprietario',
        'id_serra',
        'id_coltura',
        'data_semina',
        'data_raccolta_teorica',
        'data_raccolta_effettiva'
    ];

    protected $casts = [
        'data_semina' => 'date',
        'data_raccolta_teorica' => 'date',
        'data_raccolta_effettiva' => 'date',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    public function owner(): BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return $this->belongsTo(Owner::class, 'id_proprietario', 'id');
    }

    public function green_house(): BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return $this->belongsTo(GreenHouse::class, 'id_serra', 'id');
    }

    public function cultivation(): BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return $this->belongsTo(Cultivation::class, 'id_coltura', 'id');
    }
}