<?php

namespace App\Services\CampRefugeeCount;

use App\Models\RefugeeCamp;

class RefugeeCampCountValidator
{
    public function validate(int $refugeeCapacity, RefugeeCamp $camp): int
    {
        if ($refugeeCapacity > $camp->originalCapacity) {
            return false;
        } else {
            return true;
        }
    }
}
