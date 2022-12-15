import './bootstrap';

const submitButton = document.querySelector('.--submit');
const formContent = document.querySelector('.--form');


    function submitForm() {
        formContent.submit();
    }

if(submitButton) {
    submitButton.addEventListener('click', () => {
        submitForm();
        submitButton.disabled = true;
    })
}

let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 5,
    center: { lat: 48.4, lng: 31.5 },
    scrollWheel: true,
  });
  const uluru = { lat: 48.4, lng: 31.5};
  let marker = new google.maps.Marker({
    position: uluru,
    map: map,
    draggable: true
  });

  google.maps.event.addListener(marker, 'position_changed',
  function () {
    let lat = marker.position.lat()
    let lng = marker.position.lng()
    $('#lat').val(lat)
    $('#lng').val(lng)
  })
  google.maps.event.addListener(map, 'click',
  function (event) {
    pos = event.latLng
    marker.setPosition(pos)
  })
  
}

window.initMap = initMap;