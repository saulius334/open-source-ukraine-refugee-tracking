<?php

namespace App\Observers;

use App\Models\OutsideRequest;
use App\Services\ImageServices\ImagePathService;

class OutsideRequestObserver
{
    public function deleted(OutsideRequest $outsideRequest): void
    {
        if ($outsideRequest->photo) {
            $unlinkService = new ImagePathService();
            $unlinkService->unlink($outsideRequest->photo);
        }
    }
}
