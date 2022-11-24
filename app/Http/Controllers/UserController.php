<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'camps' => RefugeeCamp::where('user_id', Auth::id())->paginate(5)
        ]);
    }
}
