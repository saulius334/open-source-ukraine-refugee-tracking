<?php

declare(strict_types=1);

namespace App\Services\RefugeeCampCountService;

use App\Models\RefugeeCamp;

interface RefugeeCampCountServiceInterface
{
    public function update(RefugeeCamp $camp): void;
}
