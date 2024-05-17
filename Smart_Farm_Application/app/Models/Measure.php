<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\GreenHouse;
use App\Models\RealizedMeasure;
use Carbon\Carbon;

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

    protected $dates = ["timestamp"];

    public function getYourTimestampFieldAttribute($value)
    {
        // $value è il valore grezzo del campo timestamp dal database
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function serra() : BelongsTo
    {
        // (Model_di_riferimento, 'nome_campo_Model_corrente', 'nome_campo_Model_riferito')
        return ($this)->belongsTo(GreenHouse::class, 'id_serra', 'id');
    }

    public function misure_realizzate() : HasMany
    {
        return ($this)->hasMany(RealizedMeasure::class);
    }

}
