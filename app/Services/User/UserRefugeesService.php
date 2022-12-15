<?php

declare(strict_types=1);

namespace App\Services\User;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class UserRefugeesService
{
    public function __construct(
        private RefugeeRepositoryInterface $refugeeRepo,
        private RefugeeCampRepositoryInterface $campRepo,
    ) {
    }

    public function getRefugeesByUserId(int $userId, int $confirmed): ?Collection
    {
        $campList = $this->campRepo->getCampsByUserId($userId);
        foreach ($campList as $camp) {
            $refugees = $this->refugeeRepo->getRefugeesByCampId($camp->id);
        }
        $result = $refugees->filter(function ($value) use ($confirmed) {
            return $value->confirmed == $confirmed;
        });
        return $result;
    }
}
