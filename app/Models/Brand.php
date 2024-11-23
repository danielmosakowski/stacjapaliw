<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];  // Umożliwia masową przypisanie wartości

    // Relacja z tabelą 'stations'
    public function stations(): HasMany
    {
        return $this->hasMany(Station::class);
    }
}
