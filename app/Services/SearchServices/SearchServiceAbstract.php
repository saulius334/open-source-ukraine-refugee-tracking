<?php

declare(strict_types=1);

namespace App\Services\SearchServices;

interface SearchServiceInterface
{
    public function filter(?string $request);
}