<?php

namespace App\Observers;

use App\Models\Refugee;
use App\Services\CampRefugeeCount\CampRefugeeCreateAndDeleteCountService;
use App\Services\ImageServices\ImagePathService;

class RefugeeObserver
{
    public function created(Refugee $refugee): void
    {
        $countService = new CampRefugeeCreateAndDeleteCountService($refugee);
        $countService->updateCount('-');
    }

    public function deleted(Refugee $refugee): void
    {
        $unlinkService = new ImagePathService();
        $unlinkService->unlink($refugee);

        $countService = new CampRefugeeCreateAndDeleteCountService($refugee);
        $countService->updateCount('+');
    }
}
