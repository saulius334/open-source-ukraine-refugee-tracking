<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use App\Models\OutsideRequest;
use Intervention\Image\Facades\Image;

class OutsideRequestController extends Controller
{

    public function index()
    {
        return view('request.index', [
            'outsideRequests' => OutsideRequest::orderBy('updated_at', 'desc')->paginate(15),
        ]);
    }

    public function create(RefugeeCamp $campId)
    {
        return view('request.create',[
            'campId' => $campId,
            'camps' => RefugeeCamp::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:2|max:30',
            'IDnumber' => 'required|min:10|max:10|unique:refugees,IDnumber',
            'bedsTaken' => 'required',
            'current_refugee_camp_id' => 'required',
            'photo' => 'sometimes|required|mimes:jpg|max:3000'
        ],
        [
            'name.required' => 'Please add your name.',
            'surname.required' => 'Please add your surname.',
            'IDnumber.required' => 'Please enter valid Ukrainian ID number',
            'IDnumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
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
        OutsideRequest::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'IDnumber' => $request->IDnumber,
            'campOfRequest' => $request->campOfRequest,
            'photo' => $imagePath,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition,
            'bedsTaken' => $request->bedsTaken,
        ]);

        return redirect()->route('req_index')->with('message', 'Request sent');
    }

    public function show(OutsideRequest $outsideRequest)
    {
        
    }

    public function destroy(OutsideRequest $outsideRequest)
    {
        $outsideRequest->delete();
        return redirect()->route('c_index');
    }
}
