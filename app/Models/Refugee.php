<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'IDnumber', 'refugee_camp_id', 'family', 'pets', 'destination', 'aidReceived', 'healthCondition', 'moodUponArrival', 'bedsTaken'];

    public function getCamp() {
        return $this->belongsTo(RefugeeCamp::class, 'refugee_camp_id', 'id');
    }
}
