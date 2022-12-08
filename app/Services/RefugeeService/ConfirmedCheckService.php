<?php

declare(strict_types=1);

namespace App\Services\RefugeeService;

use Illuminate\Support\Facades\Auth;

class ConfirmedCheckService
{
    public function checkIfConfirmed(int $refugeeCampId): bool
    {
        if (!Auth::user()) {
            return false;
        } elseif ($refugeeCampId == Auth::user()->id) {
            return true;
        } else {
            return false;
        }
    }
}