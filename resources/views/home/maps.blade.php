@extends('components.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ukraine Refugee Tracking Map</div>

                <div class="card-body">
                    <p>Here you can see all the registered refugee camps. Please click on one and select to register.</p>
                </div>
                <div id="map" class="showMap m-3"></div>

            </div>
        </div>
    </div>
</div>

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD_StI2EFQ0q_t62Y3bqMFFOmN_wmg9Bc&callback=initMap&v=weekly">
</script>
<script>
    let map;
    const camps = JSON.parse('{{$camps}}'.replaceAll('&quot;', '"'));

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5, 
            center: {
                lat: 48.4, lng: 31.5
            }, 
            scrollWheel: true
        });
        camps.map(val => {
            let marker = new google.maps.Marker({
                position: {
                    lat: +val.coords_lat, 
                    lng: +val.coords_lng
                }, 
                map: map, 
                draggable: true, 
                title: val.name
            });

            const content = val.name + "<br>" +
            'Capacity: ' + val.currentCapacity + '/' + val.originalCapacity;

            attachInfo(marker, content);
        });
    }

    function attachInfo(marker, content) {
        const infowindow = new google.maps.InfoWindow({
            content: content
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    }

    window.initMap = initMap;

</script>
@endsection
