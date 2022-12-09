@extends('components.layouts.app')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <form action="" method="get">
                <div class="card-header search-card">
                    <h2>Refugees</h2>
                    <div class="input-group rounded search-div">
                            <input type="search" name="search" class="form-control" placeholder="Search"/>
                            <button type="submit" class="btn btn-primary search-btn"><span>Go</span></button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($refugees as $refugee)
                        <li class="list-group-item">
                            <div class="camp-list">
                                <div class="content">
                                    <h2>{{$refugee->name}} {{$refugee->surname}}</h2>
                                    <h4><span>Camp: </span>{{$refugee->getCamp->name}}</h4>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('r_show', $refugee)}}" class="btn btn-info">Show</a>
                                    @if(!Auth::user() == null && $refugee->getCamp->id == Auth::user()->id)
                                    <a href="{{route('r_edit', $refugee)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('r_delete', $refugee)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No refugees</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{ $refugees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
