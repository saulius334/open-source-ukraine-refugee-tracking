<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;

class UnconfirmedController extends Controller
{
    public function create(Refugee $unconfirmedRequest)
    {
        return view('unconfirmed.create', [
            'camps' => RefugeeCamp::all(),
            'unconfirmedRequest' => $unconfirmedRequest,
        ]);
    }
}
