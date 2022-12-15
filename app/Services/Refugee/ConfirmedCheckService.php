<?php

declare(strict_types=1);

namespace App\Services\Refugee;

class ConfirmedCheckService
{
    public function checkIfConfirmed(string $refugeeCampId, ?int $userId): bool
    {
        if (!$refugeeCampId == $userId) {
            return false;
        }
        return true;
    }
}
