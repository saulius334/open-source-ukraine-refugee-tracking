<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefugeeCamp extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'rooms', 'volunteers', 'user_id'];
}
