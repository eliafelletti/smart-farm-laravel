<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\SmartFarm;
use App\Models\Measure;

class GreenHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        "numero_piante",
        "id_smart_farm"
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function smart_farm() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(SmartFarm::class, 'id_smart_farm', 'id');
    }

    public function misure() : HasMany
    {
        return ($this)->hasMany(Measure::class);
    }

}
