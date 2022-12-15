<?php

declare(strict_types=1);

namespace App\Services\Refugee;

use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Services\User\UserRefugeesService;

class UpdateAllRefugeesService
{
    public function __construct(
        private UserRefugeesService $userRefugeeService,
        private RefugeeRepositoryInterface $refugeeRepo,
    ) {
    }

    public function acceptAllUnconfirmed(int $userId): void
    {
        $unconfirmed = $this->userRefugeeService->getRefugeesByUserId($userId, 0);
        $unconfirmed->each(function ($refugee) {
            $this->refugeeRepo->update(['confirmed' => true], $refugee);
        });
    }
}
