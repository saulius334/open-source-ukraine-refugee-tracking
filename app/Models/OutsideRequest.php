<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutsideRequest extends Model
{
    use HasFactory;

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


    public function getCamp(): BelongsTo
    {
        return $this->belongsTo(RefugeeCamp::class, 'current_refugee_camp_id', 'id');
    }
}
