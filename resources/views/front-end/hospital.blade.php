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

        var hospitals = [
            {
                name: 'Rumah Sakit Umum Sanglah',
                lat: -8.6741,
                lng: 115.2109
            },
            {
                name: 'Rumah Sakit BIMC',
                lat: -8.6838,
                lng: 115.1731
            },
            {
                name: 'Rumah Sakit Kasih Ibu',
                lat: -8.6769,
                lng: 115.2157
            },
            {
                name: 'Rumah Sakit Surya Husadha',
                lat: -8.6480,
                lng: 115.2098
            },
            {
                name: 'Rumah Sakit Dharma Usadha',
                lat: -8.6276,
                lng: 115.2130
            },
            {
                name: 'Rumah Sakit Tabanan',
                lat: -8.5550,
                lng: 115.1278
            },
            {
                name: 'Rumah Sakit Karangasem',
                lat: -8.4500,
                lng: 115.5667
            },
            {
                name: 'Rumah Sakit Negara Klungkung',
                lat: -8.5344,
                lng: 115.4044
            }
        ];

        hospitals.forEach(function(hospital) {
            var marker = L.marker([hospital.lat, hospital.lng]).addTo(map);
            var content = '<b>' + hospital.name + '</b><br>Latitude: ' + hospital.lat + '<br>Longitude: ' + hospital.lng;
            marker.bindPopup(content);
        });
    });
</script>
@endsection
