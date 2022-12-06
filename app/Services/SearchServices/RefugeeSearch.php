<?php

declare(strict_types=1);

namespace App\Services\SearchServices;

use App\Models\Refugee;
use App\Enums\PaginateEnum;
use App\Services\SearchServices\SearchServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class RefugeeSearch implements SearchServiceInterface
{
    public function filter(?string $request): LengthAwarePaginator
    {
        return Refugee::search($request)->paginate(PaginateEnum::Five);
    }
}