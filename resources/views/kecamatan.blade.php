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
                        <h3 class="card-title"><i class="fa fa-pencil-square display-12 "></i>Tambah Data Kecamatan</span></h3>
                        <br>
                        <div class="form-validation">
                                <form  action="/kecamatan" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="no_kecamatan">No Kecamatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-lg-6 @error('no_kecamatan') is-invalid @enderror" id="no_kecamatan" placeholder="Masukan Kode Kecamatan" name="no_kecamatan" value="{{ old('no_kecamatan') }}">
                                            @error('no_kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div> 
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama_kecamatan">Nama Kecamatan <span class="text-danger">*</span>
                                        </label>
                                            <input type="text" class="form-control col-lg-6 @error('nama_kecamatan') is-invalid @enderror" id="nama_kecamatan" placeholder="Masukan Kecamatan" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">Kode Geojson <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-lg-6 @error('kd_kecamatan') is-invalid @enderror" id="kd_kecamatan" placeholder="Masukan Kode Kecamatan" name="kd_kecamatan" value="{{ old('kd_kecamatan') }}">
                                            @error('kd_kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div> 
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="geojson">File Geojson <span class="text-danger">*</span>
                                        </label>
                                            <input type="file" class="uploads form-control col-lg-6 @error('geojson') is-invalid @enderror" id="geojson" placeholder="Pilih File Geojson" name="geojson" value="{{ old('geojson') }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="latitude">Latitude <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control col-lg-6 @error('latitude') is-invalid @enderror" id="latitude" placeholder="LATITUDE" name="latitude" value="{{ old('latitude') }}">
                                        @error('latitude')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">Longitude <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control col-lg-6 @error('longitude') is-invalid @enderror" id="longitude" placeholder="LONGITUDE" name="longitude" value="{{ old('longitude') }}">
                                        @error('longitude')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div> 
                                    <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Pilih Lokasi</button>
                                    </div>

                                </div>

                                <div class="bootstrap-modal">
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
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button style="float: right;" type="submit" class="btn btn-primary"><span class="mr-3"><i class="fa fa-floppy-o"></i></span>Simpan</button>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><i class="fa fa-university display-12 "></i>Data Kecamatan</span></h3>
                        {{-- <h4 class="card-title">Data Kecamatan</h4> --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kecamatan</th>
                                        <th>Kecamatan</th>
                                        <th>longitude</th>
                                        <th>latitude</th>
                                        {{-- <th>geojson</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kecamatan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->no_kecamatan }}</td>
                                        <td>{{ $item->nama_kecamatan }}</td>
                                        <td>{{ $item->longitude }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        {{-- <td>{{ $item->geojson }}</td> --}}

                                        <td>     
                                            <a href="{{url('ubahkecamatan',$item->kd_kecamatan)}}" class="btn mb-1 btn-outline-primary"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Ubah</a>
                                        {{-- <button style="float: right;" type="submit" class="btn btn-primary"><span class="mr-3"><i class="fa fa-floppy-o"></i></span>Simpan</button> --}}
                                        <form action="{{ route('kecamatan.destroy', $item->kd_kecamatan) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        <button  class="btn mb-1 btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><span class="mr-2"><i class="fa fa-trash"></i></span>Hapus</button>
                                        {{-- <button  class="btn mb-1 btn-outline-danger delete"> Delete</button> --}}
                                        </form>

                                            {{-- <a href="{{url('delete-kecamatan',$item->kd_kecamatan)}}" class="btn mb-1 btn-outline-danger">Hapus</a>    --}}
                                            {{-- <a href="#" class="btn mb-1 btn-outline-danger delete-desa" data-id="{{$item->kd_kecamatan}}" data-nama="{{ $item->nama_kecamatan}}"><span class="mr-2"><i class="fa fa-trash"></i></span>Hapus</a>   --}}

                                    @endforeach                                       
                                        </td>
                                    </tr>
                                   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-desa').click( function(){
            var kodekecamatan = $(this).attr('data-id')
            var namakecamatan = $(this).attr('data-nama')
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus Data Dengan Nama "+namakecamatan+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete-kecamatan/"+kodekecamatan+""
                        swal("Data Berhasil Di Hapus", {
                        icon: "success",
                        });
                    } else {
                        swal("Data Tidak Jadi Di Hapus");
                    }
                });
        });
    </script>

    <script>
            @if (Session::has('success'))
            toastr.success("{{ Session::get('success')}}")
        @endif
    </script>

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