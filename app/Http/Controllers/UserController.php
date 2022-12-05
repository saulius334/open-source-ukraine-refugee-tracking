<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myCamps()
    {
        return view('user.camps', [
            'camps' => RefugeeCamp::where('user_id', Auth::id())->paginate(5)
        ]);
    }
    public function requests()
    {
        return view('user.requests', [
            'unconfirmedRequests' => Auth::user()->getUnconfirmedRefugees()->paginate(5)
        ]);
    }
}
