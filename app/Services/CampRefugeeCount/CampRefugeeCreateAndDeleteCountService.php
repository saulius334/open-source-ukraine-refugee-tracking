<?php

namespace App\Services\CampRefugeeCount;

use App\Models\Refugee;
use App\Models\RefugeeCamp;

class CampRefugeeCreateAndDeleteCountService
{
    private RefugeeCamp $camp;
    public function __construct(private Refugee $refugee)
    {
        $this->camp = RefugeeCamp::where('id', $refugee->current_refugee_camp_id)->first();
        $this->validator = new CampRefugeeCountValidator();
    }
    public function updateCount(string $param): void
    {
        $this->camp->update([
            'currentCapacity' => $this->makeCorrectOperator($param)
        ]);
    }
    private function makeCorrectOperator(string $param): int
    {
        $difference = match ($param) {
            '-' => $this->camp->currentCapacity - $this->refugee->bedsTaken,
            '+' => $this->camp->currentCapacity + $this->refugee->bedsTaken
        };
        return $this->validator->checkCountLogic($difference, $this->camp);
    }
}
