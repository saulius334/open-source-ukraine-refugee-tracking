<?php

namespace App\Services\OutsideRequestServices;

use App\Models\OutsideRequest;
use App\Models\Refugee;

class OldRequestDeletion
{
    public function deleteOldRequest(Refugee $refugee)
    {
        $allRequests = OutsideRequest::all();
        foreach ($allRequests as $request) {
            if ($refugee->IdNumber == $request->IdNumber) {
                $request->delete();
            }
        }
    }
}
