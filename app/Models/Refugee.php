<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refugee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'IdNumber',
        'bedsTaken',
        'confirmed',
        'current_refugee_camp_id',
        'photo',
        'pets',
        'destination',
        'aidReceived',
        'healthCondition',
    ];

    public function getCamp(): BelongsTo
    {
        return $this->belongsTo(RefugeeCamp::class, 'current_refugee_camp_id', 'id');
    }
    public function getPhoto(): string
    {
        return $this->photo;
    }
}
