@extends('components.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{$outsideRequest->name}} {{$outsideRequest->surname}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('req_storeRefugeeAndDeleteRequest', $outsideRequest)}}" method="post" enctype="multipart/form-data" class="--form">
                        <div class="img-small-ch mb-3">
                            @if($outsideRequest->photo)
                            <div class="img">
                                <img class="w-25 mb-3" src="/storage/{{ $outsideRequest->photo }}" alt="Refugee Photo" />
                            </div>
                            @else
                            <h2>No photo</h2>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name', $outsideRequest->name)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Surname</span>
                            <input type="text" name="surname" class="form-control" value="{{old('surname', $outsideRequest->surname)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ID number</span>
                            <input type="text" name="IdNumber" class="form-control" value="{{old('IdNumber', $outsideRequest->IdNumber)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Request to Camp</span>
                            <select class="form-select" name="current_refugee_camp_id">
                                @foreach ($camps as $camp)
                                <option value="{{$camp->id}}"@if($camp->id === $outsideRequest->current_refugee_camp_id) selected @endif>{{$camp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Beds taken</span>
                            <input type="text" name="bedsTaken" class="form-control" value="{{old('bedsTaken', $outsideRequest->bedsTaken)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" multiple class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pets</span>
                            <input type="text" name="pets" class="form-control" value="{{old('pets', $outsideRequest->pets)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Destination</span>
                            <input type="text" name="destination" class="form-control" value="{{old('destination', $outsideRequest->destination)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Aid Received?</span>
                            <input type="text" class="form-control" name="aidReceived" value="{{old('aidReceived', $outsideRequest->aidReceived)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Health Condition</span>
                            <input type="text" class="form-control" name="healthCondition" disabled value="{{old('healthCondition', $outsideRequest->healthCondition)}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-success mb-4 --submit">Accept</button>
                    </form>
                    <form action="{{route('req_delete', $outsideRequest)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Dismiss</button>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
