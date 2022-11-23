<?php 

namespace App\Services;

use App\Models\Refugee;
use App\Models\RefugeeCamp;

class CampRefugeeCountService
{
    public function updateCount(Refugee $refugee)
    {
        $camp = RefugeeCamp::all()->where('id', '=', $refugee->current_refugee_camp_id);
        $camp[0]->update([
            'currentCapacity' => $camp[0]->currentCapacity - $refugee->bedsTaken
        ]);
    }
}