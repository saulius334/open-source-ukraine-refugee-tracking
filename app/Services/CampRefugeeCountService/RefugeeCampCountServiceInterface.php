<?php

declare(strict_types=1);

namespace App\Services\CampRefugeeCountService;

use App\Models\RefugeeCamp;

interface RefugeeCampCountServiceInterface
{
    public function updateCampCount(RefugeeCamp $camp): void;
}
