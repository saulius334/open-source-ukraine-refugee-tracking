<?php

declare(strict_types=1);

namespace App\Services\Shared\SearchService;

use Illuminate\Support\Collection;
use App\Services\Shared\DTO\SearchDTO;
use Illuminate\Contracts\Pagination\Paginator;

interface SearchServiceInterface
{
    public function search(Collection $searchable, SearchDTO $searchDTO): Paginator;
}