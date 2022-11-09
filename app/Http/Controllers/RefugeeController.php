<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class RefugeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('refugee.index', [
        'refugees' => Refugee::orderBy('updated_at', 'desc')->paginate(15)
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RefugeeCamp $camp)
    {
        return view('refugee.create', [
            'camps' => RefugeeCamp::all(),
            'campID' => $camp->id
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
            'surname' => 'required|min:2|max:30',
            'IDnumber' => 'required|min:10|max:10|unique:refugees,IDnumber',
            'bedsTaken' => 'required',
            'refugee_camp_id' => 'required'
        ],
        [
            'name.required' => 'Please add your name.',
            'surname.required' => 'Please add your surname.',
            'IDnumber.required' => 'Please enter valid Ukrainian ID number',
            'IDnumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
            'bedsTaken' => 'Please specify how many beds will you take.'
        ]);
        $imagePath = request('photo')->store('uploads', 'public');
        // dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
        $image->save();
        Refugee::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'IDnumber' => $request->IDnumber,
            'refugee_camp_id' => $request->refugee_camp_id,
            'photo' => $imagePath,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition,
            'bedsTaken' => $request->bedsTaken,
        ]);

        return redirect()->route('r_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return \Illuminate\Http\Response
     */
    public function show(Refugee $refugee)
    {
        return view('refugee.show', [
            'refugee' => $refugee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return \Illuminate\Http\Response
     */
    public function edit(Refugee $refugee)
    {
        return view('refugee.edit', [
            'refugee' => $refugee,
            'camps' => RefugeeCamp::all(),
            'campID' => $refugee->refugee_camp_id
            ]);
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
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:2|max:30',
            'IDnumber' => 'required|min:10|max:10|',
            Rule::unique('refugees', 'IDnumber')->ignore($refugee->IDnumber),
            'bedsTaken' => 'required',
            'refugee_camp_id' => 'required'
        ],
        [
            'name.required' => 'Please add name.',
            'surname.required' => 'Please add surname.',
            'IDnumber.required' => 'Please enter valid Ukrainian ID number',
            'IDnumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
            'bedsTaken' => 'Please specify how many beds will you take.'
        ]);
        if($request->hasFile('photo')) {
            $imagePath = request('photo')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
            $image->save();
        } else {
            $imagePath = $refugee->photo;
        }
        $refugee->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'IDnumber' => $request->IDnumber,
            'refugee_camp_id' => $request->refugee_camp_id,
            'photo' => $imagePath,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition,
            'bedsTaken' => $request->bedsTaken,
        ]);

        return redirect()->route('r_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refugee  $refugee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refugee $refugee)
    {
        unlink(public_path().'/storage/'. $refugee->photo);
        $refugee->delete();
        return redirect()->route('r_index');
    }
}
