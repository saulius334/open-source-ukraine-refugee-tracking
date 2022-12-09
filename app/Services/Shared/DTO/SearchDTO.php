<?php

declare(strict_types=1);

namespace App\Services\Shared\DTO;

class SearchDTO
{
    public function __construct(private string $searchInput)
    {
    }

    public function getSearchInput(): string
    {
        return $this->searchInput;
    }
}