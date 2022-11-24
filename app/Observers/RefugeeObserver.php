<?php

namespace App\Observers;

use App\Models\Refugee;
use App\Services\ImageServices\ImageUnlink;
use App\Services\CampRefugeeCount\CampRefugeeCreateAndDeleteCountService;

class RefugeeObserver
{
    public function created(Refugee $refugee): void
    {
        $countService = new CampRefugeeCreateAndDeleteCountService($refugee);
        $countService->updateCount('-');
    }

    public function deleted(Refugee $refugee): void
    {
        $unlinkService = new ImageUnlink();
        $unlinkService->unlink($refugee);
        
        $countService = new CampRefugeeCreateAndDeleteCountService($refugee);
        $countService->updateCount('+');
    }

}
