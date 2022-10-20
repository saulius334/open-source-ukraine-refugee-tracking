<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use App\Http\Requests\StoreRefugeeCampRequest;
use App\Http\Requests\UpdateRefugeeCampRequest;

class RefugeeCampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRefugeeCampRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRefugeeCampRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefugeeCamp  $refugeeCamp
     * @return \Illuminate\Http\Response
     */
    public function show(RefugeeCamp $refugeeCamp)
    {
        //
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
