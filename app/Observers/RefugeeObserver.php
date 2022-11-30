<?php

namespace App\Observers;

use App\Models\OutsideRequest;
use App\Models\Refugee;
use App\Services\CampRefugeeCount\CampRefugeeCreateAndDeleteCountService;
use App\Services\ImageServices\ImagePathService;
use App\Services\OutsideRequestServices\OldRequestDeletion;

class RefugeeObserver
{
    public function __construct()
    {
        
    }
    public function created(Refugee $refugee): void
    {
        $countService = new CampRefugeeCreateAndDeleteCountService($refugee);
        $countService->updateCount('-');
        
        // $deleteService = new OldRequestDeletion();
        // $deleteService->deleteOldRequest($refugee);
    }

    public function deleted(Refugee $refugee): void
    {
        if ($refugee->photo) {
            $unlinkService = new ImagePathService();
            $unlinkService->unlink($refugee->photo);
        }

        $countService = new CampRefugeeCreateAndDeleteCountService($refugee);
        $countService->updateCount('+');
    }
}
