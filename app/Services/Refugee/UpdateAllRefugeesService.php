<?php

declare(strict_types=1);

namespace App\Services\Refugee;

use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class UpdateAllRefugeesService
{
    public function __construct(private RefugeeRepositoryInterface $refugeeRepo)
    {
    }

    public function acceptAllUnconfirmed(int $userId): void
    {
        $unconfirmed = $this->refugeeRepo->getRefugeesByUserId($userId, false);
        $unconfirmed->each(function ($refugee) {
            $this->refugeeRepo->update(['confirmed' => true], $refugee);
        });
    }
}
