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
                    <div class="camp-show">
                        <div class="img-small-ch mt-3">
                            @if($outsideRequest->photo)
                            <div class="img">
                                <img class="w-25 mb-3" src="/storage/{{ $outsideRequest->photo }}" alt="Refugee Photo" />
                            </div>
                            @else
                            <h2>No photo</h2>
                            @endif
                        </div>
                        <div class="line"><small>Requested Camp: </small>
                            <h5>{{ $outsideRequest->getCamp->name }}</h5>
                        </div>
                        <div class="line"><small>Destination:</small>
                            <h5>{{ $outsideRequest->destination ?? '-'}}</h5>
                        </div>
                        <div class="line"><small>ID number:</small>
                            <h5>{{ $outsideRequest->IDnumber }}</h5>
                        </div>
                        <div class="line"><small>Beds wanted:</small>
                            <h5>{{ $outsideRequest->bedsTaken }}</h5>
                        </div>
                        <div class="line"><small>Pets:</small>
                            <h5>{{ $outsideRequest->pets ?? '-'}}</h5>
                        </div>
                        <div class="line"><small>Aid Received:</small>
                            <h5>{{ $outsideRequest->aidReceived ?? '-'}}</h5>
                        </div>
                        <div class="line"><small>Health Condition:</small>
                            <h5>{{ $outsideRequest->healthCondition ?? '-' }}</h5>
                        </div>
                        <form action="{{route('req_create', $outsideRequest)}}" method="post">
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="{{route('req_delete', $outsideRequest)}}" method="post">
                            <button type="submit" class="btn btn-danger">Dismiss</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
