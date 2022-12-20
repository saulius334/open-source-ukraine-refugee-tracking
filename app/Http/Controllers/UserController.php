<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class UserController extends Controller
{
    public function __construct(
        private RefugeeRepositoryInterface $refugeeRepo,
        private RefugeeCampRepositoryInterface $campRepo,
    ) {
    }
    public function myCamps(): View
    {
        return view('user.camps', [
            'camps' => $this->campRepo->getCampsByUserId(Auth::user()->id)
        ]);
    }
    public function myRequests(): View
    {
        return view('user.requests', [
            'unconfirmedRequests' => $this->refugeeRepo->getRefugeesByUserId(Auth::user()->id, false)
        ]);
    }
    public function myRefugees(): View
    {
        return view('user.refugees', [
            'refugees' => $this->refugeeRepo->getRefugeesByUserId(Auth::user()->id, true)
        ]);
    }
}
