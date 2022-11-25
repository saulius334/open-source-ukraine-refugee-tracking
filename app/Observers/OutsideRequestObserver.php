<?php

namespace App\Observers;

use App\Models\OutsideRequest;
use App\Services\ImageServices\ImagePathService;

class OutsideRequestObserver
{
    public function deleted(OutsideRequest $outsideRequest): void
    {
        $unlinkService = new ImagePathService();
        $unlinkService->unlink($outsideRequest);
    }
}
