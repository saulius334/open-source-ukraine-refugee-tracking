<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

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

    public function getAllAssignedCampOutsideRequests(): int
    {
        $camps = $this->getCamps()->get();
        $count = 0;
        foreach ($camps as $camp) {
            $count += $camp->getOutsideRequests()->count();
        }
        return $count;
    }
}
