<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;

class RefugeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RefugeeCamp $campID)
    {
        return view('refugee.create', [
            'camps' => RefugeeCamp::all(),
            'campID' => $campID
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRefugeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'surname' => 'required|numeric|min:1|max:100',
            'bedsTaken' => 'required',
        ],
        [
            'name.required' => 'Please add your name.',
            'surname.required' => 'Please add your surname.',
            'bedsTaken' => 'Please specify how many beds will you take.'
        ]);
        Refugee::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'refugee_camp_id' => $request->refugee_camp_id,
            'photo' => $request->photo,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition,
            'bedsTaken' => $request->bedsTaken,
        ]);

        return redirect()->route('c_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return \Illuminate\Http\Response
     */
    public function show(Refugee $refugee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return \Illuminate\Http\Response
     */
    public function edit(Refugee $refugee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRefugeeRequest  $request
     * @param  \App\Models\Refugee  $refugee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refugee $refugee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refugee $refugee)
    {
        //
    }
}
