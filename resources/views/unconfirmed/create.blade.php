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
                    <form action="{{route('r_store')}}" method="post" enctype="multipart/form-data" class="--form">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name*</span>
                            <input type="text" name="name" class="form-control" value="{{old('name', $unconfirmedRequest->name)}}">
                        </div>
                        <small class="requiredField"></small>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Surname*</span>
                            <input type="text" name="surname" class="form-control" value="{{old('surname', $unconfirmedRequest->surname)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ID number*</span>
                            <input type="text" name="IdNumber" class="form-control" value="{{old('IdNumber', $unconfirmedRequest->IdNumber)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Camp*</span>
                            <select class="form-select" name="current_refugee_camp_id">
                                @foreach ($camps as $camp)
                                <option value="{{$camp->id}}" @if($camp->id === $unconfirmedRequest->current_refugee_camp_id) selected @endif>{{$camp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Beds taken*</span>
                            <input type="text" name="bedsTaken" class="form-control" value="{{old('bedsTaken', $unconfirmedRequest->bedsTaken)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" multiple class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pets</span>
                            <input type="text" name="pets" class="form-control" value="{{old('pets', $unconfirmedRequest->pets)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Destination</span>
                            <input type="text" name="destination" class="form-control" value="{{old('destination', $unconfirmedRequest->destination)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Aid Received?</span>
                            <div class="form-check form-check-inline m-2">
                                <input class="form-check-input" type="radio" name="aidReceived" id="aidReceived1" value="Yes" @if ($unconfirmedRequest->aidReceived == true) @checked(true) @endif>
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
                                <option value="Good" @if($unconfirmedRequest->healthCondition == 'Good') selected @endif>Good</option>
                                <option value="Normal" @if($unconfirmedRequest->healthCondition == 'Normal') selected @endif>Normal</option>
                                <option value="Bad"@if($unconfirmedRequest->healthCondition == 'Bad') selected @endif>Bad</option>
                            </select>
                        </div>
                        @csrf
                        @if($camp->user_id === Auth::id())
                        <button type="submit" class="btn btn-secondary --submit">Register to {{ $unconfirmedRequest->getCamp->name }}</button>
                        @else
                        <button type="submit" class="btn btn-secondary --submit">Request</button>
                        @endif
                    </form>
                </div>
            </div>
            <small>Fields with * are required</small>
        </div>
    </div>
</div>
@endsection
