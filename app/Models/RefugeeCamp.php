<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RefugeeCamp extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'originalCapacity',
        'currentCapacity',
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
}
