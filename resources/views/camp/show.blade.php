@extends('components.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Refugee Camp {{ $camp->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="camp-show">
                        <div class="line"><small>Capacity:</small>
                            <h5>{{$camp->capacity}}</h5>
                        </div>
                        <div class="line"><small>Number of Rooms:</small>
                            <h5>{{$camp->rooms}}</h5>
                        </div>
                        <div class="line"><small>Number of Volunteers:</small>
                            <h5>{{$camp->volunteers}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>