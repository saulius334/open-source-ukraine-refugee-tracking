<?php

namespace App\Http\Controllers;

use App\Models\RefugeeFamily;
use App\Http\Requests\StoreRefugeeFamilyRequest;
use App\Http\Requests\UpdateRefugeeFamilyRequest;

class RefugeeFamilyController extends Controller
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
     * @param  \App\Http\Requests\StoreRefugeeFamilyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRefugeeFamilyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefugeeFamily  $refugeeFamily
     * @return \Illuminate\Http\Response
     */
    public function show(RefugeeFamily $refugeeFamily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefugeeFamily  $refugeeFamily
     * @return \Illuminate\Http\Response
     */
    public function edit(RefugeeFamily $refugeeFamily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRefugeeFamilyRequest  $request
     * @param  \App\Models\RefugeeFamily  $refugeeFamily
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRefugeeFamilyRequest $request, RefugeeFamily $refugeeFamily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefugeeFamily  $refugeeFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefugeeFamily $refugeeFamily)
    {
        //
    }
}
