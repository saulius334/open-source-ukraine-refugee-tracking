<?php

namespace App\Services\CampRefugeeCount;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\CampRefugeeCount\CampRefugeeCountValidator;

class CampRefugeeUpdateCountService
{
    private RefugeeCamp $camp;
    private CampRefugeeCountValidator $validator;
    public function __construct(private Refugee $refugee)
    {
        $this->camp = RefugeeCamp::where('id', $this->refugee->current_refugee_camp_id)->first();
        $this->validator = new CampRefugeeCountValidator();
    }
    public function updateCount(UpdateRefugeeRequest $request): void
    {
        $difference = $this->validator->checkCountLogic($this->refugee->bedsTaken - (int)$request->bedsTaken, $this->camp);
        $this->camp->update([
            'currentCapacity' => $this->camp->currentCapacity + $difference
        ]);
    }
}
