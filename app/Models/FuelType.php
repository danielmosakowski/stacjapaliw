<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FuelType extends Model
{
    use HasFactory;
    // Definiujemy pola, które mogą być masowo przypisane
    protected $fillable = ['name'];

    // Relacja z tabelą station_fuel_types (wiele stacji może mieć dany typ paliwa)
    public function stationFuelTypes(): HasMany
    {
        return $this->hasMany(StationFuelType::class);
    }
}
