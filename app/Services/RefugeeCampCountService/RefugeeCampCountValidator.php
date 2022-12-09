<?php

namespace App\Services\RefugeeCampCountService;

use App\Models\RefugeeCamp;

class RefugeeCampCountValidator
{
    public function validate(int $refugeeCapacity, RefugeeCamp $camp): int
    {
        if ($refugeeCapacity > $camp->originalCapacity) {
            return false;
        }
        return true;
    }
}
