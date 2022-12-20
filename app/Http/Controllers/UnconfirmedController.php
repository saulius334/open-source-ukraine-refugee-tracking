<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use Illuminate\Contracts\View\View;

class UnconfirmedController extends Controller
{
    public function __construct(private RefugeeCampRepositoryInterface $campRepo)
    {
    }
    public function create(Refugee $unconfirmedRequest): View
    {
        return view('unconfirmed.create', [
            'camps' => $this->campRepo->getAll(),
            'refugee' => $unconfirmedRequest,
        ]);
    }
}
