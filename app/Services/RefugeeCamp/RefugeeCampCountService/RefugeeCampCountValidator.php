<?php

namespace App\Services\RefugeeCamp\RefugeeCampCountService;

use App\Models\RefugeeCamp;

class RefugeeCampCountValidator
{
    public function validate(int $refugeeCapacity, int $originalCapacity): bool
    {
        if ($refugeeCapacity > $originalCapacity) {
            return false;
        }
        return true;
    }
}
