<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefugeeCampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('camp.index', [
            'camps' => RefugeeCamp::latest()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('camp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRefugeeCampRequest  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('u_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefugeeCamp  $refugeeCamp
     * @return \Illuminate\Http\Response
     */
    public function show(RefugeeCamp $camp)
    {
        return view('camp.show', [
            'camp' => $camp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefugeeCamp  $refugeeCamp
     * @return \Illuminate\Http\Response
     */
    public function edit(RefugeeCamp $camp)
    {
        return view('camp.edit', [
            'camp' => $camp,
            'refugees' => Refugee::all(),   
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRefugeeCampRequest  $request
     * @param  \App\Models\RefugeeCamp  $refugeeCamp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefugeeCamp $camp)
    {
        $camp->update([
            'name' => $request->name,
            'currentCapacity' => $request->originalCapacity - $camp->originalCapacity + $camp->currentCapacity,
            'originalCapacity' => $request->originalCapacity,
            'rooms' => $request->rooms,
            'volunteers' => $request->volunteers,
        ]);

        return redirect()->route('c_index');
    }

    public function destroy(RefugeeCamp $camp)
    {
        $camp->delete();
        return redirect()->route('c_index');
    }
}
