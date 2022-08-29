@extends('layouts.master')

@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                                <form  action="/kecamatan" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama">Kode Kecamatan <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="kd_kecamatan" placeholder="Masukan Kode Kecamatan" name="kd_kecamatan" value="{{ old('kd_kecamatan') }}">
                                        </div>
                                    </div> 
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Kecamatan <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama_kecamatan" placeholder="Masukan Kecamatan" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}">
                                    </div>
                                </div> 
                                
                             
                                {{-- <div class="form-group">
                                    <label for="cover" class="col-md-4 control-label"><b>Cover</b></label>
                                    <div class="col-md-6">
                                    <img width="200" height="200" />
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                                    </div>
                                </div> --}}
                                
                                {{-- <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Pilih Lokasi
                                    </label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" id="longitude" placeholder="LONGITUDE" name="longitude" value="{{ old('longitude') }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" id="latitude" placeholder="LATITUDE" name="latitude" value="{{ old('latitude') }}">
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="gambar">Geojson <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="uploads form-control" id="gambar" placeholder="Pilih File" name="gambar" value="{{ old('gambar') }}">
                                    </div>
                                </div>   --}}

                                {{-- <div class="card-body">
                                    <div id="map" style='width' 100%; height='80vh' > </div> 
                                </div> --}}

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$kecamatan = [
			"BUNTULIA"=>"#ff0000",
			 "DENGILO"=>"#041C32",
			 "DUHIADAA"=>"#A13333",
			 "LEMITO"=>"#B3541E",
			 "Marisa"=>"#864879",
			 "PAGUAT"=>"#1E5128",
			 "PATILANGGIO"=>"#FEC260",
			 "POPAYATO"=>"#261C2C",
			];

?>



{{-- <script>

    const providerOSM = new GeoSearch.OpenStreetMapProvider();

            
    var map = L.map('map', {
        fullscreenControll: true,
        fullscreenControll: {
            pseudoFullscreen: false
        };
    }).setView([0.6665875, 121.647892], 10);
    
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 19,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map); 

    let marker = {};
    map.on('click', function(e){
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        if (marker != undefined){
            map.removeLayer(marker)
        }

        document.querySelector("#latitude").value = latitude;
        document.querySelector("#longitude").value = longitude;


        var popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Kordinat : " + latitude + " - " + longitude)
            .openOn(map);

     marker = L.marker([latitude, longitude]).addTo(map);

    
    });

        const search = new GeoSearch.GeoSearchControl({
        provider: providerOSM,
        style: 'bar',
        searchLabel: 'Sinjai',
    });

    map.addControl(search);

</script> --}}

<script>
     // you want to get it of the window global
     const providerOSM = new GeoSearch.OpenStreetMapProvider();

    //leaflet map
    var leafletMap = L.map('map', {
    fullscreenControl: true,

    fullscreenControl: {
        pseudoFullscreen: false 
    },
    minZoom: 2
    }).setView([0.6665875, 121.647892], 10);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 19,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
    }).addTo(leafletMap);

    let theMarker = {};

    leafletMap.on('click',function(e) {
        let latitude  = e.latlng.lat.toString().substring(0,15);
        let longitude = e.latlng.lng.toString().substring(0,15);

        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;

        let popup = L.popup()
            .setLatLng([latitude,longitude])
            .setContent("Kordinat : " + latitude +" - "+  longitude)
            .openOn(leafletMap);

        if (theMarker != undefined) {
            leafletMap.removeLayer(theMarker);
        };
        theMarker = L.marker([latitude,longitude]).addTo(leafletMap);  
    });

    const search = new GeoSearch.GeoSearchControl({
        provider: providerOSM,
        style: 'bar',
        searchLabel: 'Sinjai',
    });

    leafletMap.addControl(search);
</script>

@endsection


