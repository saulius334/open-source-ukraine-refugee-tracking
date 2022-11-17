<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefugeeCamp extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'originalCapacity', 'currentCapacity', 'rooms', 'volunteers', 'user_id'];

    public function getRefugees() {
        return $this->hasMany(Refugee::class, 'current_refugee_camp_id', 'id');
    }
}
