<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Technology;
use App\Models\SmartFarm;

class UsedTechnology extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_tecnologia",
        "id_smart_farm",
    ];

    protected $casts = [
        "created_at" => "datetime:Y-m-d",
        "updated_at" => "datetime:Y-m-d"
    ];

    public function smart_farm() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(SmartFarm::class, 'id_smart_farm', 'id');
    }

    public function tecnologia() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(Technology::class, 'id_tecnologia', 'id');
    }    
    
}
