@extends('components.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit camp</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('c_update', $camp)}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title', $camp->name)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Capacity</span>
                            <input type="text" name="capacity" class="form-control" value="{{old('capacity', $camp->capacity)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Number of Rooms</span>
                            <input type="text" name="rooms" class="form-control" value="{{old('rooms', $camp->rooms)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Number of Volunteers</span>
                            <input type="text" name="volunteers" class="form-control" value="{{old('volunteers', $camp->volunteers)}}">
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection