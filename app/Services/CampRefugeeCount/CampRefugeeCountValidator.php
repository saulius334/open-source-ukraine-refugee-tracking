<?php

namespace App\Services\CampRefugeeCount;

use App\Models\RefugeeCamp;

class CampRefugeeCountValidator
{
    public function checkCountLogic(int $difference, RefugeeCamp $camp): int
    {
        if ($difference > $camp->originalCapacity) {
            return $camp->originalCapacity;
        } else {
            return $difference;
        }
    }
}
