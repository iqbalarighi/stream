@extends('layouts.absen')

@section('header')
    <!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Absensi Karyawan</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<style type="text/css">
	.webcam-capture,
	.webcam-capture video{
		display: inline-block;
		width: 100% !important;
		margin: auto;
		height: auto !important;
		border-radius: 15px;
	}

	#map { height: 250px; }.
</style>

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
<div class="section full mt-2">
    <div class="section-title">Title</div>
    <div class="wide-block pt-2 pb-2">
    	<div class="row">
    		<div class="col">
		    	<input type="hidden" id="lokasi">
		        <div class="webcam-capture"></div>
    		</div>
		</div>
		<div class="row">
    		<div class="col">
    			<button id="capture" class="btn btn-primary btn-block">
    				<ion-icon name="camera-outline"></ion-icon>
    			Absen Masuk</button>
    		</div>
    	</div>
    	<div class="row mt-2">
    		<div class="col">
    			<div id="map"></div>
    		</div>
    	</div>
    	</div>
    </div>

@endsection

@push('myscript')
<script>
	Webcam.set({
		height: 480,
		width: 640,
		image_format:'jpeg',
		jpeg_quality: 80
	})

	Webcam.attach('.webcam-capture')

var lokasi = document.getElementById('lokasi');
if(navigator.geolocation){
	navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
}

function successCallback(position) {
	lokasi.value = position.coords.latitude + "," + position.coords.longitude;

	var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 18);
	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);

	var circle = L.circle([-6.1697879,106.8381454], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 50
}).addTo(map);
	}

function errorCallback(position) {
	
}
</script>
@endpush