<?php

declare(strict_types=1);

namespace App\Services\RefugeeCamp\RefugeeCampCountService;

use App\Models\RefugeeCamp;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampCountService
{
    public function __construct(
        private RefugeeCampRepositoryInterface $campRepo,
        private RefugeeCampCountValidator $validator,
    ) {
    }

    public function update(RefugeeCamp $camp): void
    {
        $refugeeCapacity = 0;
        foreach ($camp->getRefugees()->get() as $refugee) {
            $refugeeCapacity += $refugee->bedsTaken;
        }
        $actual = $this->validator->validate($refugeeCapacity, $camp) ?
            $camp->getOriginalCapacity() - $refugeeCapacity : $camp->getOriginalCapacity();

        $this->campRepo->update(['currentCapacity' => $actual], $camp);
    }
}
