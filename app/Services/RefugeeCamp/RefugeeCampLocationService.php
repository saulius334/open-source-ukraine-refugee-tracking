<?php

declare(strict_types=1);

namespace App\Services\RefugeeCamp;

use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampLocationService
{
    public function __construct(private RefugeeCampRepositoryInterface $campRepo)
    {
    }

    public function getAllLocations(): array
    {
        $allCamps = $this->campRepo->getAll();
        $campArray = [];
        foreach ($allCamps as $camp) {
            $campArray[] = [$camp->coords_lat, $camp->coords_lng];
        }
        return $campArray;
    }
}
