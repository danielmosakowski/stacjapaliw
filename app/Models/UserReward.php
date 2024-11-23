<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserReward extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'points','reason'];

    // Relacja z tabelą 'users'
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
