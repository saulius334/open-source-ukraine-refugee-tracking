<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\RefugeeCamp;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampRepository extends BaseRepository implements RefugeeCampRepositoryInterface
{
    public function __construct(RefugeeCamp $model)
    {
        parent::__construct($model);
    }
    public function getCampsByUserId(int $userId): Collection
    {
        return $this->model->where('user_id', $userId)->get();
    }
}
