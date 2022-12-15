@extends('components.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Request Registration</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('r_update', $refugee)}}" method="post" enctype="multipart/form-data" class="--form">
                        <div class="img-small-ch mb-3">
                            @if($refugee->photo)
                                <div class="img">
                                    <img class="w-25 mb-3" src="/storage/{{ $refugee->photo }}" alt="Refugee Photo" />
                                </div>
                            @else
                                <h2>No photo</h2>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name*</span>
                            <input type="text" name="name" class="form-control" value="{{old('name', $refugee->name)}}">
                        </div>
                        <small class="requiredField"></small>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Surname*</span>
                            <input type="text" name="surname" class="form-control" value="{{old('surname', $refugee->surname)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ID number*</span>
                            <input type="text" name="IdNumber" class="form-control" readonly value="{{old('IdNumber', $refugee->IdNumber)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Camp*</span>
                            <input type="text" name="current_refugee_camp_id" class="form-control" readonly value="{{$refugee->current_refugee_camp_id}}">
                            <input type="text" name="" class="form-control" readonly value="{{$refugee->getCamp->name}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Beds taken*</span>
                            <input type="text" name="bedsTaken" class="form-control" value="{{old('bedsTaken', $refugee->bedsTaken)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" multiple class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pets</span>
                            <input type="text" name="pets" class="form-control" value="{{old('pets', $refugee->pets)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Destination</span>
                            <input type="text" name="destination" class="form-control" value="{{old('destination', $refugee->destination)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Aid Received?</span>
                            <div class="form-check form-check-inline m-2">
                                <input class="form-check-input" type="radio" name="aidReceived" id="aidReceived1" value="Yes" @if ($refugee->aidReceived == true) @checked(true) @endif>
                                <label class="form-check-label" for="aidReceived1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline m-2">
                                <input class="form-check-input" type="radio" name="aidReceived" id="aidReceived2" value="No">
                                <label class="form-check-label" for="aidReceived2">No</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Health Condition</span>
                            <select class="form-select" name="healthCondition">
                                <option value="Good" @if($refugee->healthCondition == 'Good') selected @endif>Good</option>
                                <option value="Normal" @if($refugee->healthCondition == 'Normal') selected @endif>Normal</option>
                                <option value="Bad"@if($refugee->healthCondition == 'Bad') selected @endif>Bad</option>
                            </select>
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary --submit">Register to {{ $refugee->getCamp->name }}</button>
                    </form>
                </div>
            </div>
            <small>Fields with * are required</small>
        </div>
    </div>
</div>
@endsection
