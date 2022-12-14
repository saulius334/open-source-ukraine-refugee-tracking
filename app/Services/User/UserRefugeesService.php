<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class UserRefugeesService
{

    public function __construct(
        private RefugeeRepositoryInterface $refugeeRepo,
        private RefugeeCampRepositoryInterface $campRepo,
        )
    {
    }

    public function getRefugeesByUserId(int $userId, int $confirmed)
    {
        $campList = $this->campRepo->getCampsByUserId($userId);
        $refugees = [];
        foreach ($campList as $camp) {
            $refugees[] = $this->refugeeRepo->getRefugeesByCampId($camp->id);
        }
        $result = $refugees[0]->filter(function($value) use ($confirmed) {
            return $value->confirmed == $confirmed;
        });
        return $result;
    }
}