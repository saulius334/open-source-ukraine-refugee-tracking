<?php 

namespace App\Services\CampRefugeeCount;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\CampRefugeeCount\CampRefugeeCountValidator;

class CampRefugeeUpdateCountService
{
    private RefugeeCamp $camp;
    public function __construct(private Refugee $refugee)
    {
        dd(RefugeeCamp::where('id', '=', $refugee->current_refugee_camp_id));
        $this->camp = RefugeeCamp::all()->where('id', '=', $refugee->current_refugee_camp_id)->first();
        $this->validator = new CampRefugeeCountValidator();
    }
    public function updateCount(Refugee $refugee, UpdateRefugeeRequest $request): void
    {
        $difference = $this->validator->checkCountLogic($refugee->bedsTaken - $request->bedsTaken, $this->camp); 
        $this->camp->update([
            'currentCapacity' => $this->camp->currentCapacity + $difference
        ]);
    }
}