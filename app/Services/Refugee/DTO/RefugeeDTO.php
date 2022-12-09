<?php

declare(strict_types=1);

namespace App\Services\Refugee\DTO;

use App\Services\Shared\Interfaces\RequestDTOInterface;

class RefugeeDTO implements RequestDTOInterface
{
    public function __construct(private array $refugeeInfo)
    {
    }
    public function getAllData(): array
    {
        return $this->refugeeInfo;
    }
    public function getConfirmed(): bool
    {
        return $this->refugeeInfo['confirmed'] ? true : false;
    }

}