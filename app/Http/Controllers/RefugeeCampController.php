<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRefugeeCampRequest;
use App\Http\Requests\UpdateRefugeeCampRequest;
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
            'camps' => RefugeeCamp::orderBy('updated_at', 'desc')->paginate(5)
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
            'volunteers' => 'numeric|min:0|max:100',
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

        return redirect()->route('u_index')->with('ok', 'Success');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRefugeeCampRequest  $request
     * @param  \App\Models\RefugeeCamp  $refugeeCamp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRefugeeCampRequest $request, RefugeeCamp $refugeeCamp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefugeeCamp  $refugeeCamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefugeeCamp $refugeeCamp)
    {
        //
    }
}
