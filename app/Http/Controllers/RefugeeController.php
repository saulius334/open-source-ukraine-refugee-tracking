<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;

class RefugeeController extends Controller
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
     * @param  \App\Http\Requests\StoreRefugeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRefugeeRequest $request)
    {
        //
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
    public function update(UpdateRefugeeRequest $request, Refugee $refugee)
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
