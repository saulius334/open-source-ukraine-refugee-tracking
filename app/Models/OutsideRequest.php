<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutsideRequest extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'photo',
        'IdNumber',
        'current_refugee_camp_id',
        'family',
        'pets',
        'destination',
        'aidReceived',
        'healthCondition',
        'moodUponArrival',
        'bedsTaken'
    ];

    use HasFactory;

    public function getCamp()
    {
        return $this->belongsTo(RefugeeCamp::class, 'current_refugee_camp_id', 'id');
    }
}
