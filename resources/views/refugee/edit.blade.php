@extends('components.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Refugee</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('r_update', $refugee)}}" method="post" enctype="multipart/form-data" class="--form">
                        <div class="img-small-ch">
                            @if($refugee->photo)
                            <div class="img">
                                <img class="w-25 mb-3" src="/storage/{{ $refugee->photo }}" alt="Refugee Photo" />
                            </div>
                            @else
                            <h2>No photos</h2>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name*</span>
                            <input type="text" name="name" class="form-control" value="{{old('name', $refugee->name)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Surname*</span>
                            <input type="text" name="surname" class="form-control" value="{{old('surname', $refugee->surname)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ID number*</span>
                            <input type="text" name="IdNumber" class="form-control" readonly value="{{ $refugee->IdNumber }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Camp*</span>
                            <select class="form-select" name="current_refugee_camp_id">
                                @foreach ($camps as $camp)
                                <option value="{{$camp->id}}"@if($camp->id === $campID) selected @endif>{{$camp->name}}</option>
                                @endforeach
                            </select>
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
                            <span class="input-group-text">Aid Received</span>
                            <input type="text" name="aidReceived" class="form-control" value="{{old('aidReceived', $refugee->aidReceived)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Health Condition</span>
                            <input type="text" name="healthCondition" class="form-control" value="{{old('healthCondition', $refugee->healthCondition)}}">
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary --submit">Save</button>
                    </form>
                </div>
            </div>
            <small>Fields with * are required</small>
        </div>
    </div>
</div>
@endsection