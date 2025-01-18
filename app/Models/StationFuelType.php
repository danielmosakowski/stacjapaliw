<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class StationFuelType extends Model
{
    use HasFactory;

    protected $fillable = ['station_id', 'fuel_type_id'];

    /**
     * Relacja z tabelą Station: Każdy wpis w station_fuel_type należy do jednej stacji.
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }

    /**
     * Relacja z tabelą FuelType: Każdy wpis w station_fuel_type należy do jednego typu paliwa.
     */
    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class);
    }

    public function stationPrices(): HasMany
    {
        return $this->hasMany(StationPrice::class);
    }

    public function fuelPriceSuggestions(): HasMany
    {
        return $this->HasMany(FuelPriceSuggestion::class);
    }
}
