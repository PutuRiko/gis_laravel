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

        var markers = L.layerGroup().addTo(map);

        map.on('click', function (e) {
            if (e.originalEvent.which === 1) {
                var marker = L.marker(e.latlng).addTo(markers);
                var content = "Latitude: " + e.latlng.lat.toFixed(6) + "<br>Longitude: " + e.latlng.lng.toFixed(6);
                marker.bindPopup(content).openPopup();
            }
        });

        // Hapus marker saat klik kanan
        map.on('contextmenu', function (e) {
            markers.eachLayer(function (marker) {
                if (marker.getLatLng().equals(e.latlng)) {
                    markers.removeLayer(marker);
                }
            });
        });
    });
</script>
@endsection
