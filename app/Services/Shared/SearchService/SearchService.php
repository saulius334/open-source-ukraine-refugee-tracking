<?php

declare(strict_types=1);

namespace App\Services\Shared\SearchService;

use App\Models\Refugee;
use App\Enums\PaginateEnum;
use Illuminate\Contracts\Pagination\Paginator;
use App\Services\Shared\SearchService\SearchServiceInterface;

class SearchService implements SearchServiceInterface
{
    public function filter(?string $request): Paginator
    {
        return Refugee::search($request)->paginate(PaginateEnum::Five);
    }
}