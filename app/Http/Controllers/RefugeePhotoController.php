<?php

namespace App\Http\Controllers;

use App\Models\RefugeePhoto;
use App\Http\Requests\StoreRefugeePhotoRequest;
use App\Http\Requests\UpdateRefugeePhotoRequest;

class RefugeePhotoController extends Controller
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
     * @param  \App\Http\Requests\StoreRefugeePhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRefugeePhotoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefugeePhoto  $refugeePhoto
     * @return \Illuminate\Http\Response
     */
    public function show(RefugeePhoto $refugeePhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefugeePhoto  $refugeePhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(RefugeePhoto $refugeePhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRefugeePhotoRequest  $request
     * @param  \App\Models\RefugeePhoto  $refugeePhoto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRefugeePhotoRequest $request, RefugeePhoto $refugeePhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefugeePhoto  $refugeePhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefugeePhoto $refugeePhoto)
    {
        //
    }
}
