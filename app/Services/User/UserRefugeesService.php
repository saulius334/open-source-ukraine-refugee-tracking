<?php

declare(strict_types=1);

namespace App\Services\User;

use Illuminate\Support\Collection;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class UserRefugeesService
{
    public function __construct(
        private RefugeeRepositoryInterface $refugeeRepo,
        private RefugeeCampRepositoryInterface $campRepo,
    ) {
    }

    public function getRefugeesByUserId(int $userId, bool $confirmed): ?Collection
    {
        $campList = $this->campRepo->getCampsByUserId($userId);
        $refugees = collect();
        foreach ($campList as $camp) {
            $campRefugees = $this->refugeeRepo->getRefugeesByCampId($camp->id);
            foreach ($campRefugees as $refugee) {
                $refugees->add($refugee);
            }
        }
        $result = $refugees->filter(function ($value) use ($confirmed) {
            return $value->confirmed == $confirmed;
        });
        return $result;
    }
}
