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
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="{{ url('kecamatan/update/' .$kecamatan->kd_kecamatan) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">No Kecamatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-lg-6" id="kd_kecamatan" placeholder="Masukan Kode Kecamatan" name="kd_kecamatan" value="{{ $kecamatan->no_kecamatan}}">
                                    </div> 
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">Nama Kecamatan <span class="text-danger">*</span>
                                        </label>
                                            <input type="text" class="form-control col-lg-6" id="nama_kecamatan" placeholder="Masukan Kecamatan" name="nama_kecamatan" value="{{ $kecamatan->nama_kecamatan}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">Kode Geojson <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-lg-6 @error('kd_kecamatan') is-invalid @enderror" id="kd_kecamatan" placeholder="Masukan Kode Kecamatan" name="kd_kecamatan" value="{{ $kecamatan->kd_kecamatan}}">
                                    </div> 
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="geojson">File Geojson <span class="text-danger">*</span>
                                        </label>
                                            <input type="file" class="uploads form-control col-lg-6 @error('geojson') is-invalid @enderror" id="geojson" placeholder="Pilih File Geojson" name="geojson" value="{{ $kecamatan->geojson}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">Latitude <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control col-lg-6" id="latitude" placeholder="LATITUDE" name="latitude" value="{{ $kecamatan->latitude}}">
                                    </div>
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">Longitude <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control col-lg-6" id="longitude" placeholder="LONGITUDE" name="longitude" value="{{ $kecamatan->longitude}}">
                                    </div> 
                                    <div>
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Pilih Lokasi</button> --}}
                                    </div>

                                </div>

                                {{-- <div class="bootstrap-modal">
                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <div>
                                                        <div id="map" style='width' 100%; height='80vh' > </div> 
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button style="float: right;" type="submit" class="btn btn-primary"><span class="mr-3"><i class="fa fa-floppy-o"></i></span>Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">                                                    
                                                    <div>
                                                        <div id="map" style='width' 100%; height='80vh' > </div> 
                                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection

@push('update')

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
			'Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
    }).addTo(leafletMap);
    
    //ICON
    var puskesIcon = L.icon({
    iconUrl: 'webmap/icons/puskes.png',
    iconSize:     [24, 28], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
    
    // MARKER DATABSE PUSKES
    var puskesLayer;
    $( document ).ready(function(){
        $.getJSON('puskes/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)], {icon: puskesIcon}).bindPopup(
                                                                                                                                "Puskesmas : " + (data[index].nama_puskes + "<br  />" 
                                                                                                  
                                                                                                                              )).addTo(leafletMap);                                                                                                             
  
            });
        });
    });

// MARKER DATABASE DESA
var desaLayer;
    $( document ).ready(function(){
        $.getJSON('desa/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)]).bindPopup("Desa : " + (data[index].nama_desa + "<br  />" )).addTo(leafletMap);                                                                                                             
  
            });
        });
    });


// MARKER DATABASE Kecamatan
var desaLayer;
    $( document ).ready(function(){
        $.getJSON('kecamatan/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)]).bindPopup("Desa : " + (data[index].nama_desa + "<br  />" )).addTo(leafletMap);                                                                                                             
  
            });
        });
    });

    
    //GEOJSON DATABASE
    var geoLayer;
    $.getJSON('assets/Pohuwato2.geojson', function(json){
          geoLayer =  L.geoJSON(json, {
            style: function (feature) {
                return {
                    fillOpacity: 0.2,
                    weight: 1,
                    opacity: 1,
                    color: "#008cff"
                };
            },

            onEachFeature: function(feature, layer) {
                var iconLabel = L.divIcon({
                className: 'label-bidang',
                html: '<b>'+feature.properties.nama_kecamatan+'</b>',
                iconSize: [100, 20]
            });
            L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);
                       // alert(feature.properties.kd_kecamatan)


                layer.addTo(leafletMap);
            }
        });
    })


    //INSERT KECAMATAN
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
        searchLabel: 'Pohuwato',
    });

    leafletMap.addControl(search);
</script>
@endpush