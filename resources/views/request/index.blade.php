@extends('components.layouts.app')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>All Your Requests</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($outsideRequests as $outsideRequest)
                        @if (Auth::user()->id == $outsideRequest->getCamp->getUser->id)
                        <li class="list-group-item">
                            <div class="camp-list">
                                <div class="content">
                                    <h2>{{$outsideRequest->name}} {{$outsideRequest->surname}}</h2>
                                    <h4><span>Request to camp: </span>{{$outsideRequest->getCamp->name}}</h4>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('req_show', $outsideRequest)}}" class="btn btn-success">View</a>
                                    <form action="{{route('req_delete', $outsideRequest)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Dismiss</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endif
                        @empty
                        <li class="list-group-item">No requests</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{ $outsideRequests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
