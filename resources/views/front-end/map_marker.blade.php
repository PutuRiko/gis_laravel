@extends('front-end.layout')

@section('content')
<div id="map" style="height: 720px;"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map', {
            zoomControl: false
        }).setView([-8.409517, 115.188919], 10); 

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([-8.409517, 115.188919]).addTo(map); 

        var content = "<b>Ini di Bali</b><br>Latitude: " + marker.getLatLng().lat.toFixed(6) + "<br>Longitude: " + marker.getLatLng().lng.toFixed(6);
        marker.bindPopup(content).openPopup();
    });
</script>
@endsection
