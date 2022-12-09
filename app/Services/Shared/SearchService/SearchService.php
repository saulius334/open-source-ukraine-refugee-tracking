<?php

declare(strict_types=1);

namespace App\Services\Shared\SearchService;

use App\Enums\PaginateEnum;
use Illuminate\Support\Collection;
use App\Services\Shared\DTO\SearchDTO;
use Illuminate\Contracts\Pagination\Paginator;
use App\Services\Shared\SearchService\SearchServiceInterface;

class SearchService implements SearchServiceInterface
{
    public function search(Collection $searchable, SearchDTO $searchDTO): Paginator
    {
        // return Refugee::search($request)->paginate(PaginateEnum::Five);
        return $searchable->where('name', 'like', '%' . $searchDTO->getSearchInput() . '%')->paginate(PaginateEnum::Five);
    }
}