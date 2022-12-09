<?php

declare(strict_types=1);

namespace App\Services\SearchService;

use App\Models\Refugee;
use App\Enums\PaginateEnum;
use App\Services\SearchService\SearchServiceInterface;
use Illuminate\Contracts\Pagination\Paginator;

class RefugeeSearch implements SearchServiceInterface
{
    public function filter(?string $request): Paginator
    {
        return Refugee::search($request)->paginate(PaginateEnum::Five);
    }
}