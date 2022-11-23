<?php 

namespace App\Services;

use App\Http\Requests\UpdateRefugeeRequest;
use App\Models\Refugee;
use App\Models\RefugeeCamp;

class CampRefugeeCountService
{
    // private RefugeeCamp $camp;
    public function __construct(private Refugee $refugee)
    {
        $this->camp = RefugeeCamp::where('id', '=', $refugee->current_refugee_camp_id)->get();
    }
    public function updateCount(string $param): void
    {
        $this->camp[0]->update([
            'currentCapacity' => $this->makeCorrectOperator($param)
        ]);
    }
    public function updateCountRefugeeUpdated(Refugee $refugee, UpdateRefugeeRequest $request): void
    {
        $difference = $this->checkCountLogic($refugee->bedsTaken - $request->bedsTaken); 
        $this->camp[0]->update([
            'currentCapacity' => $this->camp[0]->currentCapacity + $difference
        ]);
    }
    private function makeCorrectOperator(string $param): int
    {
        $difference = match ($param) {
            '-' => $this->camp[0]->currentCapacity - $this->refugee->bedsTaken,
            '+' => $this->camp[0]->currentCapacity + $this->refugee->bedsTaken
        };
        return $this->checkCountLogic($difference);
    }
    private function checkCountLogic(int $difference): int
    {
        if ($difference > $this->camp[0]->originalCapacity) {
            return $this->camp[0]->originalCapacity;
        } else {
            return $difference;
        }

    }
}