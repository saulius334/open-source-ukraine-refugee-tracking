@extends('components.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2>New Refugee Camp</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('c_store')}}" method="post" class="--form">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Camp name*</span>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Capacity*</span>
                            <input type="text" name="originalCapacity" class="form-control" value="{{old('originalCapacity')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Number of Rooms</span>
                            <input type="text" name="rooms" class="form-control" value="{{old('rooms')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Number of volunteers</span>
                            <input type="text" name="volunteers" class="form-control" value="{{old('volunteers')}}">
                        </div>
                        <div id="map"></div>
                        <input type="text" readonly placeholder="latitude" name="coords_lat" class="form-control mt-3 mb-3" value="{{old('coords_lat')}}">
                        <input type="text" readonly placeholder="longitude" name="coords_lng" class="form-control mb-3" value="{{old('coords_lng')}}">
                        @csrf
                        <button type="submit" class="btn btn-secondary --submit">Create camp</button>
                    </form>
                </div>
            </div>
            <small>Fields with * are required</small>
        </div>
    </div>
</div>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD_StI2EFQ0q_t62Y3bqMFFOmN_wmg9Bc&callback=initMap&v=weekly">
</script>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5, 
            center: {
                lat: 48.4, lng: 31.5
            }, 
            scrollWheel: true
        });

        let marker = false;

        google.maps.event.addListener(map, 'click', function (event) {
            if(marker) marker.setMap(null);

            marker = new google.maps.Marker({
                position: {
                    lat: event.latLng.lat(), 
                    lng: event.latLng.lng()
                }, 
                map: map
            });

            document.querySelector('input[name="coords_lat"]').value = event.latLng.lat();
            document.querySelector('input[name="coords_lng"]').value = event.latLng.lng();
        });
    }

    window.initMap = initMap;

</script>
@endsection
