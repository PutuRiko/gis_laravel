@extends('front-end.layout')

@section('content')
<div id="map" style="height: 720px;"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/leaflet.markercluster.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/MarkerCluster.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/MarkerCluster.Default.css" />

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map', {
            zoomControl: false
        }).setView([-8.409517, 115.188919], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = L.markerClusterGroup(); // Menggunakan marker cluster

        map.on('click', function (e) {
            var marker = L.marker(e.latlng).addTo(markers);
            var content = "Latitude: " + e.latlng.lat.toFixed(6) + "<br>Longitude: " + e.latlng.lng.toFixed(6);
            marker.bindPopup(content).openPopup();
        });

        map.addLayer(markers); // Menambahkan layer marker cluster ke peta
    });
</script>
@endsection
