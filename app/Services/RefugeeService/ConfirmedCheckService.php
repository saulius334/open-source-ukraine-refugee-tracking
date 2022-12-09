<?php

declare(strict_types=1);

namespace App\Services\RefugeeService;

class ConfirmedCheckService
{
    public function checkIfConfirmed(int $refugeeCampId, ?int $userId): bool
    {
        if (!$refugeeCampId == $userId) {
            return false;
        }
        return true;
    }
}