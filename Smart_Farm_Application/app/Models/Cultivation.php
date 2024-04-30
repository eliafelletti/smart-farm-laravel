<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\RealizedCrop;

class Cultivation extends Model
{
    use HasFactory;

    protected $fillable = [
        "tipologia"
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function realizedCrops(): HasMany
    {
        return $this->hasMany(RealizedCrop::class);
    }

}
