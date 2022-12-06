<?php

declare(strict_types=1);

namespace App\Services\CampRefugeeCountService;

use App\Models\RefugeeCamp;
use App\Services\CampRefugeeCount\RefugeeCampCountServiceInterface;

class RefugeeCampCountService implements RefugeeCampCountServiceInterface
{
    private RefugeeCampCountValidator $validator;
    public function __construct()
    {
        $this->validator = new RefugeeCampCountValidator();
    }

    public function updateCampCount(RefugeeCamp $camp): void
    {
        $refugeeCapacity = 0;
        foreach ($camp->getRefugees()->get() as $refugee) {
            $refugeeCapacity += $refugee->bedsTaken;
        }

        if ($this->validator->validate($refugeeCapacity, $camp)) {
            $this->updateCamp($camp, $camp->originalCapacity - $refugeeCapacity);
        } else {
            $this->updateCamp($camp, $camp->originalCapacity);
        }
    }

    private function updateCamp(RefugeeCamp $camp, int $actual)
    {
        $camp->update([
            'currentCapacity' => $actual
        ]);
    }
}