<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Services\ImageServices\ImagePathService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refugee extends Model
{
    use HasFactory, Searchable;

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
    protected function photo(): Attribute
    {
        $imagePathService = new ImagePathService();

        return Attribute::make(
            set: fn ($photo) => $imagePathService->updateImageAndGetPath($this, $photo)
        );
    }
    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname
        ];
    }
    public function getTodayRefugees()
    {
        return $this->where('created_at', '>' , Carbon::yesterday());
    }
}
