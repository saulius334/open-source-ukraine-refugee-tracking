@extends('components.layouts.app')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <form action="" method="get">
                    <div class="card-header search-card">
                        <h2>Camps</h2>
                        <div class="input-group rounded search-div">
                                <input type="search" name="search" class="form-control" placeholder="Search"/>
                                <button type="submit" class="btn btn-primary search-btn"><span>Go</span></button>
                            </div>
                        </div>
                    </form>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($camps as $camp)
                        <li class="list-group-item">
                            <div class="camp-list">
                                <div class="content">
                                    <h2><span>Camp name: </span>{{$camp->name}}</h2>
                                    <h4><span>Capacity: </span>{{ $camp->currentCapacity }}/{{ $camp->originalCapacity }}</h4>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('c_show', $camp)}}" class="btn btn-info">Show</a>
                                    @if(!Auth::user() == null && $camp->user_id === Auth::id())
                                    <a href="{{route('c_edit', $camp)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('c_delete', $camp)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No refugee camps found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{-- {{ $camps->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
