<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefugeePhoto extends Model
{
    use HasFactory;

    protected $fillable = ['refugee_id', 'url'];
}
