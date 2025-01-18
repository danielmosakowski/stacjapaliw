<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuelPriceSuggestion extends Model
{
    use HasFactory;

    protected $table = 'fuel_price_suggestions';
    protected $fillable = ['user_id', 'station_fuel_type_id', 'suggested_price', 'photo_path', 'price_date', 'approved'];

    // Relacja z tabelą 'stations'
    public function station(): BelongsTo
    {
        return $this->belongsTo(StationFuelType::class);
    }

    // Relacja z tabelą 'users'
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
