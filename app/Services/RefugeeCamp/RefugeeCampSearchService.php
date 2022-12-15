<?php

declare(strict_types=1);

namespace App\Services\RefugeeCamp;

use Illuminate\Support\Collection;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampSearchService
{
    private Collection $searchable;
    public function __construct(private RefugeeCampRepositoryInterface $campRepo)
    {
        $this->searchable = $this->campRepo->getAll();
    }
    public function search(?string $query): Collection
    {
        if (!$query) {
            return $this->searchable;
        }
        return $this->searchable->filter(function ($value) use ($query) {
            return stripos($value->name, $query) !== false;
        });
    }
}
