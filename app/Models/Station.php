<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'name', 'address', 'latitude', 'longitude'
    ];

    // Relacja z tabelą 'brands'
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }



    public function stationFuelTypes(): HasMany
    {
        return $this->HasMany(StationFuelType::class);
    }

    public function stationPrices(): HasMany
    {
        return $this->HasMany(StationPrice::class);
    }

    public function fuelPriceSuggestions(): HasMany
    {
        return $this->HasMany(FuelPriceSuggestion::class);
    }
}
