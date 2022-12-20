<?php

namespace App\Observers;

use App\Models\Refugee;
use App\Services\Refugee\ImageService;
use App\Services\RefugeeCamp\RefugeeCampCountService\RefugeeCampCountService;

class RefugeeObserver
{
    public function __construct(
        private RefugeeCampCountService $countService,
        private ImageService $imageService,
    ) {
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
        $this->imageService->unlink($refugee->photo);
    }
}
