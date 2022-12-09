<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use App\Services\Shared\DTO\SearchDTO;
use Illuminate\Database\Eloquent\Model;
use App\Services\Shared\SearchService\SearchService;
use App\Services\Shared\Interfaces\RequestDTOInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{   
    private SearchService $searchService;

    public function __construct(private string $subject)
    {
        $this->searchService = new SearchService();
    }

    public function getAll(): Collection
    {
        return $this->subject::all();
    }

    public function getSearched(Collection $searchable, ?SearchDTO $searchDTO): Paginator
    {
        if (!$searchDTO) {
            return $searchable;
        }
        return $this->searchService->search($searchable, $searchDTO);
    }

    public function store(RequestDTOInterface $requestDTO): void
    {
        $this->subject::create($requestDTO->getAllData());
    }

    public function update(RequestDTOInterface $requestDTO, Model $subject): void
    {
        $subject->update($requestDTO->getAllData());
    }

    public function destroy(Model $subject): void
    {
        $subject->delete();
    }
}