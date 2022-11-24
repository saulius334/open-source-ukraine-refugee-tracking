<?php

namespace App\Observers;

use App\Models\OutsideRequest;
use App\Services\ImageServices\ImageUnlink;

class OutsideRequestObserver
{
    public function deleted(OutsideRequest $outsideRequest)
    {
        $unlinkService = new ImageUnlink();
        $unlinkService->unlink($outsideRequest);
    }
}
