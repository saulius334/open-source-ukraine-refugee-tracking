<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myCamps()
    {
        return view('user.camps', [
            'camps' => RefugeeCamp::where('user_id', Auth::id())->paginate(5)
        ]);
    }
    public function unconfirmedRequests()
    {
        return view('user.unconfirmed', [
            'unconfirmedRequests' => User::getAllAssignedCampRequests()
        ]);
    }
}
