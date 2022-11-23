<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class RefugeeController extends Controller
{
    public function index()
    {
       return view('refugee.index', [
        'refugees' => Refugee::orderBy('updated_at', 'desc')->paginate(15)
       ]);
    }

    public function create(RefugeeCamp $camp)
    {
        // dd($camp->id);
        if ($camp->id == null) {
            return redirect()->back()->with('message', 'Create a refugee camp first before adding refugees!');
        } else {
             return view('refugee.create', [
            'camp' => $camp,
            'camps' => RefugeeCamp::all(),
            'campID' => $camp->id
        ]);
        }
       
    }

    public function store(Request $request)
    {
 
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:2|max:30',
            'IdNumber' => 'required|numeric|digits:10|unique:refugees,IdNumber',
            'bedsTaken' => 'required',
            'current_refugee_camp_id' => 'required',
            'photo' => 'sometimes|required|mimes:jpg|max:3000'
        ],
        [
            'name.required' => 'Please add your name.',
            'surname.required' => 'Please add your surname.',
            'IdNumber.required' => 'Please enter valid Ukrainian ID number',
            'IdNumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
            'bedsTaken' => 'Please specify how many beds will you take.',
            'photo.max' => 'file exceeds 3MB'
        ]);
        if ($request->photo)
        {
            $imagePath = request('photo')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
            $image->save();
        } else {
            $imagePath = '';
        }
        // dd($camp);
        Refugee::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'IdNumber' => $request->IdNumber,
            'current_refugee_camp_id' => $request->current_refugee_camp_id,
            'photo' => $imagePath,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition,
            'bedsTaken' => $request->bedsTaken,
        ]);
        $camp = RefugeeCamp::all()->where('id', '=', $request->current_refugee_camp_id);
        $camp[0]->update([
            'currentCapacity' => $camp[0]->originalCapacity - $request->bedsTaken
        ]);

        return redirect()->route('r_index');
    }

    public function show(Refugee $refugee)
    {
        return view('refugee.show', [
            'refugee' => $refugee
        ]);
    }

    public function edit(Refugee $refugee)
    {
        return view('refugee.edit', [
            'refugee' => $refugee,
            'camps' => RefugeeCamp::all(),
            'campID' => $refugee->current_refugee_camp_id
            ]);
    }

    public function update(Request $request, Refugee $refugee)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:2|max:30',
            'IdNumber' => 'required|numeric|digits:10',
            Rule::unique('refugees', 'IdNumber')->ignore($refugee->IDnumber),
            'bedsTaken' => 'required',
            'current_refugee_camp_id' => 'required'
        ],
        [
            'name.required' => 'Please add name.',
            'surname.required' => 'Please add surname.',
            'IdNumber.required' => 'Please enter valid Ukrainian ID number',
            'IdNumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
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
            'IdNumber' => $request->IdNumber,
            'current_refugee_camp_id' => $request->current_refugee_camp_id,
            'photo' => $imagePath,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition,
            'bedsTaken' => $request->bedsTaken,
        ]);

        return redirect()->route('r_index');
    }

    public function destroy(Refugee $refugee)
    {
        if($refugee->photo !== '') {
            unlink(public_path().'/storage/'. $refugee->photo);
        }
        $camp = RefugeeCamp::all()->where('id', '=', $refugee->current_refugee_camp_id);
        $camp[0]->update([
            'currentCapacity' => $camp[0]->originalCapacity - $refugee->bedsTaken
        ]);
        $refugee->delete();
        return redirect()->route('r_index');
    }
}
