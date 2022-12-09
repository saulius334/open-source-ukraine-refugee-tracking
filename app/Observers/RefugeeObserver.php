<?php

namespace App\Observers;

use App\Models\Refugee;
use App\Services\ImageService\ImagePathService;
use App\Services\RefugeeCamp\RefugeeCampCountService\RefugeeCampCountService;

class RefugeeObserver
{
    public function __construct(private RefugeeCampCountService $countService)
    {
    }

    public function created(Refugee $refugee): void
    {
        if ($refugee->confirmed) {
            $this->countService->update($refugee->getCamp);
        }
    }

    public function updated(Refugee $refugee): void
    {
        $this->countService->update($refugee->getCamp);
    }

    public function deleted(Refugee $refugee): void
    {
        $this->countService->update($refugee->getCamp);
    }
}
