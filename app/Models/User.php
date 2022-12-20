<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCamps(): HasMany
    {
        return $this->hasMany(RefugeeCamp::class, 'user_id', 'id');
    }

    public function getRefugees(): HasManyThrough
    {
        return $this->hasManyThrough(
            Refugee::class,
            RefugeeCamp::class,
            'user_id',
            'current_refugee_camp_id'
        );
    }
    public function getUnconfirmedRefugees(): HasManyThrough
    {
        return $this->getRefugees()->where('confirmed', 0);
    }
    public function getConfirmedRefugees(): HasManyThrough
    {
        return $this->getRefugees()->where('confirmed', 1);
    }
}
