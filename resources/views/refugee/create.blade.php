@extends('components.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Refugee Registration</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('r_store')}}" method="post" enctype="multipart/form-data" class="--form">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Surname</span>
                            <input type="text" name="surname" class="form-control" value="{{old('surname')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ID number</span>
                            <input type="text" name="IDnumber" class="form-control" value="{{old('IDnumber')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Camp</span>
                            <select class="form-select" name="current_refugee_camp_id">
                                @foreach ($camps as $camp)
                                <option value="{{$camp->id}}"@if($camp->id === $campID) selected @endif>{{$camp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Beds taken</span>
                            <input type="text" name="bedsTaken" class="form-control" value="{{old('bedsTaken')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" multiple class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pets</span>
                            <input type="text" name="pets" class="form-control" value="{{old('pets')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Destination</span>
                            <input type="text" name="destination" class="form-control" value="{{old('destination')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Aid Received</span>
                            <input type="text" name="aidReceived" class="form-control" value="{{old('aidReceived')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Health Condition</span>
                            <input type="text" name="healthCondition" class="form-control" value="{{old('healthCondition')}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4 --submit">Register refugee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
