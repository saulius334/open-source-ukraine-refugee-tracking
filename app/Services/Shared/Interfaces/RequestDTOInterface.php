<?php

declare(strict_types=1);

namespace App\Services\Shared\Interfaces;

interface RequestDTOInterface
{
    public function __construct(array $requestData);
    public function getAllData(): array;
}
