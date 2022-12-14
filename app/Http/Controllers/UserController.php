<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\User\UserRefugeesService;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class UserController extends Controller
{
    public function __construct(
        private UserRefugeesService $userRefugeesService,
        private RefugeeCampRepositoryInterface $campRepo,
        )
    {
        
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
            'unconfirmedRequests' => $this->userRefugeesService->getRefugeesByUserId(Auth::user()->id, 0)
        ]);
    }
    public function myRefugees(): View
    {
        return view('user.refugees',[
            'refugees' => $this->userRefugeesService->getRefugeesByUserId(Auth::user()->id, 1)
        ]);
    }
}
