<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    use HasFactory;

    protected $fillable = [
        "timestamp",
        "temperatura",
        "umidita",
        "co2",
        "irrigazione",
        "luminosita"
    ]; 

    protected $casts = [
        "timestamp" => "datetime:Y-m-d",
        "created_at" => "datetime:Y-m-d",
        "updated_at" => "datetime:Y-m-d"
    ];
}
