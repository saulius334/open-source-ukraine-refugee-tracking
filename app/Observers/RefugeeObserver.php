<?php

namespace App\Observers;

use App\Models\Refugee;
use App\Services\CampRefugeeCount\RefugeeCampCountService;
use App\Services\ImageServices\ImagePathService;

class RefugeeObserver
{
    public function __construct(private RefugeeCampCountService $countService)
    {
    }

    public function created(Refugee $refugee): void
    {
        if ($refugee->confirmed) {
            $this->countService->updateCampCount($refugee->getCamp);
        }
    }

    public function updated(Refugee $refugee): void
    {
        $this->countService->updateCampCount($refugee->getCamp);
    }

    public function deleted(Refugee $refugee): void
    {
        if ($refugee->photo) {
            $unlinkService = new ImagePathService();
            $unlinkService->unlink($refugee->photo);
        }
        $this->countService->updateCampCount($refugee->getCamp);
    }
}
