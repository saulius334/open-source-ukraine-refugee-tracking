<?php

namespace App\Http\Controllers;

use App\Enums\PaginateEnum;
use App\Models\RefugeeCamp;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myCamps()
    {
        return view('user.camps', [
            'camps' => RefugeeCamp::where('user_id', Auth::id())->paginate(PaginateEnum::Five)
        ]);
    }
    public function requests()
    {
        return view('user.requests', [
            'unconfirmedRequests' => Auth::user()->getUnconfirmedRefugees()->paginate(PaginateEnum::Five)
        ]);
    }
}
