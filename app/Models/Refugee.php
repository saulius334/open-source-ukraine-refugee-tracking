<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    use HasFactory;

    protected $fillable = ['refugee_id', 'name', 'surname','family','pets', 'destination', 'aidReceived', 'healthCondition', 'moodUponArrival', 'bedsTaken'];
}
