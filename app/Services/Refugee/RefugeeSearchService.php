<?php

declare(strict_types=1);

namespace App\Services\Refugee;

use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use Illuminate\Support\Collection;

class RefugeeSearchService
{
    private Collection $searchable;
    public function __construct(private RefugeeRepositoryInterface $refugeeRepo)
    {
        $this->searchable = $this->refugeeRepo->getConfirmedRefugees();
    }
    public function search(?string $query): Collection
    {
        if (!$query) {
            return $this->searchable;
        }
        $searchResult = $this->searchable->filter(function($value) use ($query) {
            return stripos($value->name, $query) !== false;
        });
        return $searchResult;
    }
}