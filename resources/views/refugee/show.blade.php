@extends('components.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{$refugee->name}} {{$refugee->surname}}</h2>
                </div>
                <div class="card-body">
                    <div class="camp-show">
                        <div class="img-small-ch mt-3">
                            @if($refugee->photo)
                            <div class="img">
                                <img class="w-25 mb-3" src="/storage/{{ $refugee->photo }}" alt="Refugee Photo" />
                            </div>
                            @else
                            <h2>No photos</h2>
                            @endif
                        </div>
                        <div class="line"><small>Current Camp: </small>
                            <h5>{{ $refugee->getCamp->name }}</h5>
                        </div>
                        <div class="line"><small>Destination:</small>
                            <h5>{{ $refugee->destination }}</h5>
                        </div>
                        @if(Auth::user()->role === 1)
                        <div class="line"><small>ID number:</small>
                            <h5>{{ $refugee->IDnumber }}</h5>
                        </div>
                        <div class="line"><small>Beds taken:</small>
                            <h5>{{ $refugee->bedsTaken }}</h5>
                        </div>
                        <div class="line"><small>Pets:</small>
                            <h5>{{ $refugee->pets }}</h5>
                        </div>
                        <div class="line"><small>Aid Received:</small>
                            <h5>{{ $refugee->aidReceived }}</h5>
                        </div>
                        <div class="line"><small>Health Condition:</small>
                            <h5>{{ $refugee->healthCondition }}</h5>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection