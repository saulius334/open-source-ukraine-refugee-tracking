<?php

namespace App\Observers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use App\Services\CampRefugeeCountService;

class RefugeeObserver
{
    /**
     * Handle the Refugee "created" event.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return void
     */
    public function created(Refugee $refugee)
    {
        $countService = new CampRefugeeCountService($refugee);
        $countService->updateCount('-');
    }

    /**
     * Handle the Refugee "updated" event.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return void
     */
    public function updated(Refugee $refugee)
    {
    }

    /**
     * Handle the Refugee "deleted" event.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return void
     */
    public function deleted(Refugee $refugee)
    {
        if($refugee->photo !== '') {
            unlink(public_path().'/storage/'. $refugee->photo);
        }
        $countService = new CampRefugeeCountService($refugee);
        $countService->updateCount('+');
    }

    /**
     * Handle the Refugee "restored" event.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return void
     */
    public function restored(Refugee $refugee)
    {
        //
    }

    /**
     * Handle the Refugee "force deleted" event.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return void
     */
    public function forceDeleted(Refugee $refugee)
    {
        //
    }
}