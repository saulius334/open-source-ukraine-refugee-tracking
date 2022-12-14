<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RefugeeCamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'originalCapacity',
        'currentCapacity',
        'coords_lat',
        'coords_lng',
        'rooms',
        'volunteers',
        'user_id'
    ];

    public function getRefugees(): HasMany
    {
        return $this->hasMany(Refugee::class, 'current_refugee_camp_id', 'id');
    }

    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getOriginalCapacity(): int
    {
        return $this->originalCapacity;
    }
}
