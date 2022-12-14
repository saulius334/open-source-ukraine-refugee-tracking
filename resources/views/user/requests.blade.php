@extends('components.layouts.app')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <form action="{{route('r_acceptAll')}}" method="post">
                    <div class="card-header search-card">
                        <h2>All your Requests</h2>
                        <div class="input-group rounded search-div">
                            @if(Auth::user()->getUnconfirmedRefugees()->count() != 0)
                                <button type="submit" class="btn btn-primary"><span>Accept All</span></button>
                                @endif
                            </div>
                        </div>
                        @csrf
                        @method('put')
                    </form>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($unconfirmedRequests as $unconfirmedRequest)
                        <li class="list-group-item">
                            <div class="camp-list">
                                <div class="content">
                                    <h2>{{$unconfirmedRequest->name}} {{$unconfirmedRequest->surname}}</h2>
                                    <h4><span>Request to camp: </span>{{$unconfirmedRequest->getCamp->name}}</h4>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('unconf_create', $unconfirmedRequest)}}" class="btn btn-success">View</a>
                                    <form action="{{route('r_delete', $unconfirmedRequest)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Dismiss</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No requests</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{-- {{ $unconfirmedRequests->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
