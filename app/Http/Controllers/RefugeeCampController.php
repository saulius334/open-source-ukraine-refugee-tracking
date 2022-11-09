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
            'camps' => RefugeeCamp::orderBy('updated_at', 'desc')->paginate(15)
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
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'capacity' => 'required|numeric|min:1|max:100',
            'rooms' => 'required|numeric|min:1|max:100',
            'volunteers' => 'numeric|min:0|max:1000',
        ],
        [
            'name.required' => 'Please add a name of the camp.',
            'capacity.required' => 'Please enter how many people you can take in.',
            'rooms.required' => 'Please specify how many rooms.'
        ]);
        RefugeeCamp::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
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
    public function edit(RefugeeCamp $refugeeCamp)
    {
        return view('camp.edit', [
            'camp' => $refugeeCamp,
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
    public function update(Request $request, RefugeeCamp $refugeeCamp)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'capacity' => 'required|numeric|min:1|max:100',
            'rooms' => 'required|numeric|min:1|max:100',
            'volunteers' => 'numeric|min:0|max:1000',
        ],
        [
            'name.required' => 'Please add a name of the camp.',
            'capacity.required' => 'Please enter how many people you can take in.',
            'rooms.required' => 'Please specify how many rooms.'
        ]);
        $refugeeCamp->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'rooms' => $request->rooms,
            'volunteers' => $request->volunteers,
        ]);

        return redirect()->route('c_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefugeeCamp  $refugeeCamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefugeeCamp $refugeeCamp)
    {
        $refugeeCamp->delete();
        return redirect()->route('c_index');
    }
}
