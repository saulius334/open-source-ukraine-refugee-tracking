<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\ImageServices\ImagePathService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refugee extends Model
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
    protected function photo(): Attribute
    {
        $imagePathService = new ImagePathService();

        return Attribute::make(
            set: fn ($photo) => $imagePathService->updateImageAndGetPath($this, $photo)
        );
    }
}
