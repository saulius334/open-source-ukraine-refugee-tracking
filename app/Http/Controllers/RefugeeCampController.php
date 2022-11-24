<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefugeeCampController extends Controller
{
    public function index()
    {
        return view('camp.index', [
            'camps' => RefugeeCamp::latest()->paginate(15)
        ]);
    }
    public function create()
    {
        return view('camp.create');
    }
    public function store(Request $request)
    {
        RefugeeCamp::create([
            'name' => $request->name,
            'originalCapacity' => $request->originalCapacity,
            'currentCapacity' => $request->originalCapacity,
            'rooms' => $request->rooms,
            'volunteers' => $request->volunteers,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('u_index')->with('message', 'Camp created successfully!');
    }

    public function show(RefugeeCamp $camp)
    {
        return view('camp.show', [
            'camp' => $camp
        ]);
    }

    public function edit(RefugeeCamp $camp)
    {
        return view('camp.edit', [
            'camp' => $camp,
            'refugees' => Refugee::all(),   
            ]);
    }

    public function update(Request $request, RefugeeCamp $camp)
    {
        $camp->update([
            'name' => $request->name,
            'currentCapacity' => $request->originalCapacity - $camp->originalCapacity + $camp->currentCapacity,
            'originalCapacity' => $request->originalCapacity,
            'rooms' => $request->rooms,
            'volunteers' => $request->volunteers,
        ]);

        return redirect()->route('c_index')->with('message', 'Refugee updated successfully!');
    }

    public function destroy(RefugeeCamp $camp)
    {
        $camp->delete();
        return redirect()->route('c_index')->with('message', 'Camp deleted!');
    }
}
