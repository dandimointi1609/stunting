@section('js')
<script type="text/javascript">
    $(document).on('click', '.pilih_kecamatan', function (e) {
                document.getElementById("nama_kecamatan").value = $(this).attr('data-kecamatan');
                document.getElementById("kd_kecamatan").value = $(this).attr('data-kd_kecamatan');
                console.log()
                $('#myModal2').modal('hide');
                // "iDisplayLength": 5
            });

    $(document).on('click', '.pilih_desa', function (e) {
                document.getElementById("nama_desa").value = $(this).attr('data-desa');
                document.getElementById("kd_desa").value = $(this).attr('data-kd_desa');
                $('#myModal').modal('hide');
                // "iDisplayLength": 5
            });

                        $(document).ready(function() {
            $("#lookup, #lookup2").DataTable({
            "iDisplayLength": 5
            });

            } );
</script>
@stop
@section('css')

@stop

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
                            {{-- <form class="form-valide" action="#" method="post"> --}}
                                {{-- <form class="form-valide" action="/puskes" method="post">
                                    {{ csrf_field() }} --}}
                                    
                                    <form action="{{ url('puskes/update/' .$puskes->id_puskes) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_puskes">Nama Puskesmas</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_puskes" name="nama_puskes" value="{{ $puskes->nama_puskes}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_puskes">Alamat</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $puskes->alamat}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="kd_desa">Nama Kecamatan
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            {{-- <input type="text" class="form-control" id="val-kabupaten" name="val-kabupaten" > --}}
                                            <input  class="form-control" id="kd_kecamatan" type="hidden" name="kd_kecamatan" value="{{ $puskes->kd_kecamatan}}" readonly="" required >
                                            <input type="text" class="form-control" id="nama_kecamatan" type="text" name="nama_kecamatan" value="{{ $puskes->kecamatan->nama_kecamatan}}"  required readonly="" >
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal1"><span class="fa fa-search"></span></button>
                                            </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama">Pilih Lokasi
                                        </label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" id="longitude" placeholder="LONGITUDE" name="longitude" value="{{ $puskes->longitude}}" readonly="" required >
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" id="latitude" placeholder="LATITUDE" name="latitude" value="{{ $puskes->latitude}}" readonly="" required >
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div id="map" style='width' 100%; height='80vh' > </div> 
                                    </div>

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
    <!-- #/ container -->
</div>

{{-- modal --}}
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari Kecamatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                        <th>
                            Kecamatan
                        </th>
                        </tr>
                    </thead>
                            <tbody>
                                @foreach($desa as $data)
                                <tr data-dismiss="modal" aria-label="Close" class="pilih_kecamatan"  data-kecamatan="<?php echo $data->kecamatan->nama_kecamatan; ?>" data-kd_kecamatan="<?php echo $data->kd_kecamatan; ?>" >
                                    <td class="py-1">
                        {{-- @if($data->user->gambar)
                            <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                        @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                        @endif --}}

                                {{$data->kecamatan->nama_kecamatan}}
                            </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari desa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                        <th>
                            Desa
                        </th>
                        </tr>
                    </thead>
                            <tbody>
                                @foreach($desa as $data)
                                <tr data-dismiss="modal" aria-label="Close" class="pilih_desa"  data-desa="<?php echo $data->nama_desa; ?>" data-kd_desa="<?php echo $data->kd_desa; ?>" >
                                    <td class="py-1">
                        {{-- @if($data->user->gambar)
                            <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                        @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                        @endif --}}

                                {{$data->nama_desa}}
                            </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
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

    $.getJSON('assets/popayato1.geojson', function(json) {
     geoLayer = L.geojson(json, {
            style: function(feature) {
                return{
                    fillOpacity: 0.3,
                    weight: 5,
                    opacity: 1,
                    color: "#008cff"
                };
            },
            onEachFeature: function(features, layer) {
                layer.addTo(leafletMap);
            }
        });
    })

    const search = new GeoSearch.GeoSearchControl({
        provider: providerOSM,
        style: 'bar',
        searchLabel: 'Sinjai',
    });

    leafletMap.addControl(search);
</script>

@endsection