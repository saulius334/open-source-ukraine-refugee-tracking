<?php

namespace App\Observers;

use App\Models\OutsideRequest;
use App\Services\ImageServices\ImageUnlink;

class OutsideRequestObserver
{
    /**
     * Handle the OutsideRequest "deleted" event.
     *
     * @param  \App\Models\OutsideRequest  $outsideRequest
     * @return void
     */
    public function deleted(OutsideRequest $outsideRequest): void
    {
        $unlinkService = new ImageUnlink();
        $unlinkService->unlink($outsideRequest);
    }
}
