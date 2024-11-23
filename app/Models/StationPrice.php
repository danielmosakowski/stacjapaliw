<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StationPrice extends Model
{
    use HasFactory;

    // Określamy, które kolumny mogą być masowo przypisane
    protected $fillable = [
        'station_id',
        'station_fuel_type_id',
        'price',
        'price_date'
    ];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class); // Stacja, która ma ten wpis
    }

    public function stationFuelType(): BelongsTo
    {
        return $this->belongsTo(StationFuelType::class);
    }
}
