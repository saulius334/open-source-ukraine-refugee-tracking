<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefugeeFamilyPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['refugee_families_id', 'url'];
}
