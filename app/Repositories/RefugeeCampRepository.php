<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\RefugeeCamp;
use Illuminate\Support\Facades\Auth;
use App\Services\Shared\Interfaces\RequestDTOInterface;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampRepository extends BaseRepository implements RefugeeCampRepositoryInterface
{
    public function __construct(RefugeeCamp $camp)
    {
        parent::__construct($camp);
    }

    public function store(RequestDTOInterface $requestDTO): void
    {
        RefugeeCamp::create($requestDTO->getAllData() + [
            'user_id' => Auth::id(),
        ]);
    }
}
