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
                        <h3 class="card-title"><i class="fa fa-pencil-square display-12"></i>Tambah Data Puskesmas</span></h3>
                        <br>
                        <div class="form-validation">
                                <form class="form-valide" action="/puskes" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-row">    
                                        <div class="form-group row col-md-6">
                                            <label class="col-lg-4 col-form-label" for="nama_puskes">Puskesmas <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6 @error('nama_puskes') is-invalid @enderror" id="nama_puskes" placeholder="Masukan Nama Puskes" name="nama_puskes" value="{{ old('nama_puskes') }}">
                                            @error('nama_puskes')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row col-md-6">
                                            <label class="col-lg-4 col-form-label" for="kd_kecamatan">Kecamatan <span class="text-danger">*</span></label>
                                                <div class="input-group col-md-6">
                                                    <input  class="form-control @error('kd_kecamatan') is-invalid @enderror" id="kd_kecamatan" type="hidden" name="kd_kecamatan" value="{{ old('kd_kecamatan') }}" readonly="" required >
                                                    <input type="text" class="form-control" id="nama_kecamatan" type="text" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}" required readonly="" >
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                                    </span>
                                                    @error('kd_kecamatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                        </div> 
                                    </div>

                                    <div class="form-row"> 
                                        <div class="form-group row col-md-6">
                                            <label class="col-lg-4 col-form-label" for="latitude">Latitde <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6 @error('latitude') is-invalid @enderror" id="latitude" placeholder="Masukan Latitude" name="latitude" value="{{ old('latitude') }}">
                                            @error('latitude')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div> 

                                        <div class="form-group row col-md-6">
                                            <label class="col-lg-4 col-form-label" for="alamat">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6 @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukan Alamat" name="alamat" value="{{ old('alamat') }}">
                                            @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div> 
                                    </div>

                                    <div class="form-row"> 
                                        <div class="form-group row col-md-6">
                                            <label class="col-lg-4 col-form-label" for="longitude">Longitude <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control col-lg-6 @error('longitude') is-invalid @enderror" id="longitude" placeholder="Masukan Latitude" name="longitude" value="{{ old('longitude') }}">
                                            @error('longitude')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div> 
                                    </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button style="float: right; type="submit"  class="btn btn-primary"><span class="mr-3"><i class="fa fa-floppy-o"></i></span>Simpan</button>
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
                <div class="card mb-2">
                    <div class="card-body">
                        <div id="map" style='width' 50%; height='50vh' > </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                    @foreach($kecamatan as $data)
                                    <tr data-dismiss="modal" aria-label="Close" class="pilih_kecamatan"  data-kecamatan="<?php echo $data->nama_kecamatan; ?>" data-kd_kecamatan="<?php echo $data->kd_kecamatan; ?>" >
                                        <td class="py-1">
                                    {{$data->nama_kecamatan}}
                                </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    {{-- </div> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Puskesmas</h4>
                        <div class="table-responsive">
                            {{-- <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/puskes/create"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Tambah Data</a> --}}
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
                                            <a href="{{url('ubahpuskes',$item->id_puskes)}}"  class="btn mb-1 btn-outline-primary"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Ubah</a>
                                            {{-- <a href="{{url('delete-puskes',$item->id_puskes)}}" class="btn mb-1 btn-outline-danger">Delete</a> --}}
                                            <a href="#" class="btn mb-1 btn-outline-danger delete-desa" data-id="{{$item->id_puskes}}" data-nama="{{ $item->nama_puskes}}"><span class="mr-2"><i class="fa fa-pencil-trash"></i></span>Hapus</a>  

    
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
            var kodepuskes = $(this).attr('data-id')
            var namapuskes = $(this).attr('data-nama')
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus Data Dengan Nama "+namapuskes+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete-puskes/"+kodepuskes+""
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
   }).setView([0.6665875, 121.647892], 9);

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
$.getJSON('storage/post-images/BUNTULIA.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 0.2,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


              layer.addTo(leafletMap);  
          }
      });

                 
  
})

$.getJSON('storage/post-images/DENGILO.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 1,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


              layer.addTo(leafletMap);  
          }
      });

                 
  
})

$.getJSON('storage/post-images/DUHIADAA.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 1,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


              layer.addTo(leafletMap);  
          }
      });

                 
  
})

$.getJSON('storage/post-images/LEMITO.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 1,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


              layer.addTo(leafletMap);  
          }
      });

                 
  
})

$.getJSON('storage/post-images/MARISA.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 1,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


              layer.addTo(leafletMap);  
          }
      });

                 
  
})

$.getJSON('storage/post-images/PAGUAT.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 1,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


              layer.addTo(leafletMap);  
          }
      });

                 
  
})

$.getJSON('storage/post-images/PATILANGGIO.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 1,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


              layer.addTo(leafletMap);  
          }
      });

                 
  
})

$.getJSON('storage/post-images/POPAYATO.geojson', function(json){
      geoLayer =  L.geoJSON(json, {
          style: function (feature) {
              return {
                  fillOpacity: 0.5,
                  weight: 1,
                  // opacity: 1,
                  color: ""+feature.properties.kd_warna+""
              };
          },

              onEachFeature: function(feature, layer) {
              var iconLabel = L.divIcon({
              className: 'label-bidang',
              html: '<b>'+feature.properties.nama_kecamatan+'</b>',
              iconSize: [100, 20]
              });
              
              L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);


              layer.on('mouseover', (e)=>{
                  $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                      $.each(detail, function(index){
                          // alert(detail[index].nama_kecamatan);
                          var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                              html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                              html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                              html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                              html+='<h6> Lokasi : '+detail[index].longitude+'-'+detail[index].latitude+'<h6>';
                          L.popup()
                                  .setLatLng(layer.getBounds().getCenter())
                                  .setContent(html)
                                  .openOn(leafletMap);
                      });
                  });
                  
              });
              
          layer.on('click', (e)=>{
                  $.ajax({
                              url: 'titik/data/'+feature.properties.kd_kecamatan,
                              method: "GET",
                              dataType: "JSON",
                              success: function(data) {
                              let element = [];
                              let total = [];
                              let sangat = [];

                              for (let index = 0; index < 10; index++) {
                                  if(data[index]){
                                  element[index] = data[index].nama_desa;
                                  total[index] = data[index].total_pendek;
                                  sangat[index] = data[index].sangat_pendek;

                                  }else{
                                      element[index] = "";
                                      total[index] = "";
                                  }
                                  }
                                  $('#exampleModalLong').modal('show');
                          var data = {
                                  // labels:[detail[index].kd_desa],
                                  labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                  datasets: [{
                                      label: 'Balita Pendek',
                                      // data: [detail[index].jumlah], 
                                      data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],

                                      backgroundColor: [
                                      'rgba(255, 26, 104, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(0, 0, 0, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255, 26, 104, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)',
                                      'rgba(0, 0, 0, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                                  };  

                                  // config 
                                  var config = {
                                  type: 'bar',
                                  data,
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                  };
                                  
                                  // render init block
                                  var pendekChart = new Chart(
                                  document.getElementById('pendekChart'),
                                  config
                                  );

                                  var ctx = document.getElementById("myChart").getContext('2d');
                                  var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                      datasets: [{
                                          label: 'Balita Sangat Pendek',
                                          data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> sangat[<?= $i?>], <?php } ?>],
                                          backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                          ],
                                          borderColor: [
                                          'rgba(255,99,132,1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      indexAxis: 'y', 
                                      scales: {
                                      y: {
                                          beginAtZero: true
                                      }
                                      }
                                  }
                                });  
                
                              
                              },
                              error: function(data) {}


                          });
                                  
          });


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

