<?php

declare(strict_types=1);

namespace App\Services\Shared\SearchService;

use Illuminate\Contracts\Pagination\Paginator;

interface SearchServiceInterface
{
    public function filter(?string $request): Paginator;
}