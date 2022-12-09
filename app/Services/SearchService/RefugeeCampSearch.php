<?php

declare(strict_types=1);

namespace App\Services\SearchService;

use App\Enums\PaginateEnum;
use App\Models\RefugeeCamp;
use App\Services\SearchService\SearchServiceInterface;
use Illuminate\Contracts\Pagination\Paginator;

class RefugeeCampSearch implements SearchServiceInterface
{
    public function filter(?string $request): Paginator
    {
        return RefugeeCamp::search($request)->paginate(PaginateEnum::Five);
    }
}