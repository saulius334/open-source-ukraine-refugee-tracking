@extends('components.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New Refugee Camp</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('c_store')}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Camp name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Capacity</span>
                            <input type="text" name="capacity" class="form-control" value="{{old('capacity')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Number of Rooms</span>
                            <input type="text" name="rooms" class="form-control" value="{{old('rooms')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Number of volunteers</span>
                            <input type="text" name="volunteers" class="form-control" value="{{old('volunteers')}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create camp</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
