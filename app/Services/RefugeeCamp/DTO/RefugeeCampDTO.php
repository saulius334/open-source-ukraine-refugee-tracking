<?php

declare(strict_types=1);

namespace App\Services\RefugeeCamp\DTO;

use App\Services\Shared\Interfaces\RequestDTOInterface;

class RefugeeCampDTO implements RequestDTOInterface
{
    public function __construct(private array $refugeeCampInfo)
    {
    }
    public function getAllData(): array
    {
        return $this->refugeeCampInfo;
    }
    public function setCurrentCapacity(int $capacity)
    {
        $this->refugeeCampInfo['currentCapacity'] = $capacity;
    }
    public function getCurrentCapacity(): int
    {
        return $this->refugeeCampInfo['currentCapacity'];
    }
}