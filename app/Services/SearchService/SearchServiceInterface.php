<?php

declare(strict_types=1);

namespace App\Services\SearchService;

interface SearchServiceInterface
{
    public function filter(?string $request);
}