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
                                <form class="form-valide" action="/puskes" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-row">    
                                        <div class="form-group row col-md-6" {{ $errors->has('nama_puskes') ? ' has-error' : '' }}>
                                            <label class="col-lg-4 col-form-label" for="nama_puskes">Puskesmas <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6" id="nama_puskes" placeholder="Masukan Nama Puskes" name="nama_puskes" value="{{ old('nama_puskes') }}">
                                        </div>
                                        <div class="form-group row col-md-6"  {{ $errors->has('kd_kecamatan') ? ' has-error' : '' }}>
                                            <label class="col-lg-4 col-form-label" for="kd_kecamatan">Kecamatan <span class="text-danger">*</span></label>
                                                <div class="input-group col-md-6">
                                                    <input  class="form-control" id="kd_kecamatan" type="hidden" name="kd_kecamatan" value="{{ old('kd_kecamatan') }}" readonly="" required >
                                                    <input type="text" class="form-control" id="nama_kecamatan" type="text" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}" required readonly="" >
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                                    </span>
                                                </div>
                                        </div> 
                                    </div>

                                    <div class="form-row"> 
                                        <div class="form-group row col-md-6" {{ $errors->has('latitude') ? ' has-error' : '' }}>
                                            <label class="col-lg-4 col-form-label" for="latitude">Latitde <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6" id="latitude" placeholder="Masukan Latitude" name="latitude" value="{{ old('latitude') }}">
                                        </div> 

                                        <div class="form-group row col-md-6" {{ $errors->has('alamat') ? ' has-error' : '' }}>
                                            <label class="col-lg-4 col-form-label" for="alamata">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6" id="alamat" placeholder="Masukan Alamat" name="alamat" value="{{ old('alamat') }}">
                                        </div> 
                                    </div>

                                    <div class="form-row"> 
                                        <div class="form-group row col-md-6" {{ $errors->has('longitude') ? ' has-error' : '' }}>
                                            <label class="col-lg-4 col-form-label" for="longitude">Longitude <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6" id="longitude" placeholder="Masukan Latitude" name="longitude" value="{{ old('longitude') }}">
                                        </div> 
                                        {{-- <div class="form-group row col-md-6" {{ $errors->has('kd_desa') ? ' has-error' : '' }}>
                                            <label class="col-lg-4 col-form-label"  type="hidden" for=""> <span class="text-danger"></span>
                                            </label>
                                                <button type="button" class="btn btn-primary col-lg-4" data-toggle="modal" data-target=".bd-example-modal-lg">Pilih Lokasi</button>
                                        </div> --}}
                                    </div>

                                    {{-- <div class="card-body">
                                        <div id="map" style='width' 50%; height='50vh' > </div> 
                                    </div> --}}

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button style="float: right; type="submit"  class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="bootstrap-modal">
        <!-- Large modal -->
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
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <div id="map" style='width' 50%; height='50vh' > </div> 
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
                        <h4 class="card-title">Data Puskesmas</h4>
                        <div class="table-responsive">
                            <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/puskes/create">Tambah Data</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Puskesmas</th>
                                        <th>Kecamatan</th>
                                        <th>Alamat</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puskes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_puskes }}</td>
                                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->latitude}}</td>
                                        <td>{{ $item->longitude }}</td>


                                        <td>     
                                            <a href="{{url('ubahpuskes',$item->id_puskes)}}"  class="btn mb-1 btn-outline-primary">Update</a>
                                            <a href="{{url('delete-puskes',$item->id_puskes)}}" class="btn mb-1 btn-outline-danger">Delete</a>
    
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
           'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
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

     
// MARKER DATABSE
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

        
     // MARKER DATABSE DESA
        var desaLayer;
    $( document ).ready(function(){
        $.getJSON('desa/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)]).bindPopup(
                                                                                                                                "Puskesmas : " + (data[index].nama_desa + "<br  />" 
                                                                                                  
                                                                                                                              )).addTo(leafletMap);                                                                                                             
  
            });
        });
    });


   
     
    //GEOJSON DATABASE
     var geoLayer;
     $.getJSON('assets/popayato1.geojson', function(json){
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

   //INSERT PUSKES
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

