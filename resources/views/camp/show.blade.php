@extends('components.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{$camp->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="campCard">
                        <div id="map"></div>
                        <div class="campInfo">
                            <div class="line"><small>Capacity:</small>
                                <h5>{{ $camp->currentCapacity }}/{{ $camp->originalCapacity }}</h5>
                            </div>
                            @if ($camp->rooms)
                            <div class="line"><small>Number of Rooms:</small>
                                <h5>{{ $camp->rooms }}</h5>
                            </div>
                            @endif
                            @if ($camp->volunteers)
                            <div class="line"><small>Number of Volunteers:</small>
                                <h5>{{ $camp->volunteers }}</h5>
                            </div>
                            @endif
                            <div class="line"><small>Number of Refugees:</small>
                                <h5>{{ $camp->getRefugees->count() }}</h5>
                            </div>
                            <div class="buttons">
                                @if($camp->user_id === Auth::id())
                                <a href="{{route('r_create', $camp)}}" class="btn btn-info">Register refugee</a>
                                @else
                                <a href="{{route('r_create', $camp)}}" class="btn btn-info">Request</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD_StI2EFQ0q_t62Y3bqMFFOmN_wmg9Bc&callback=initMap&v=weekly">
</script>
<script>
    let map;
    const camp = JSON.parse('{{$camp}}'.replaceAll('&quot;', '"'));
    const coordinates = [+camp.coords_lat, +camp.coords_lng];

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5, 
            center: {
                lat: coordinates[0], lng: coordinates[1]
            }, 
            scrollWheel: true
        });
        new google.maps.Marker({
                position: {
                    lat: coordinates[0], 
                    lng: coordinates[1]
                }, 
                map: map,
                title: camp.name
    })
}
window.initMap = initMap;
</script>
@endsection
