<?php

declare(strict_types=1);

namespace App\Services\SearchService;

use App\Enums\PaginateEnum;
use App\Models\RefugeeCamp;
use App\Services\SearchService\SearchServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class RefugeeCampSearch implements SearchServiceInterface
{
    public function filter(?string $request): LengthAwarePaginator
    {
        return RefugeeCamp::search($request)->paginate(PaginateEnum::Five);
    }
}