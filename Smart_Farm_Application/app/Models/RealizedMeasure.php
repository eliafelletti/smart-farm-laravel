<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealizedMeasure extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_tecnologia",
        "id_misura"
    ];

    protected $casts = [
        "created_at" => "datetime:Y-m-d",
        "updated_at" => "datetime:Y-m-d",
    ];

}
