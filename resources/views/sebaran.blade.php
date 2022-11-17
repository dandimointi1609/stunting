@extends('layouts.landing.master')

@section('content')
    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Sebaran Penderita Stunting Di Kabupaten Pohuwato</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>Longer Project Title Should Go Here</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->


    <!-- Privacy Content -->
    <div class="ex-basic-1" >
        <div class="container">
            <div class="row">

                <div class="col-lg-2 col-xl-4">
                    <label class="mr-sm-2">Pilih Kecamatan</label>
                            
                        <select class="custom-select mr-sm-2" onchange="cari(this.value)">
                            @foreach ($pencarian as $d)
                                <option value="{{$d->kd_kecamatan}}">{{$d->nama_kecamatan}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="col-lg-2 col-xl-5">
                    <label class="mr-sm-2">Download Data</label>
                        <div class="button-icon">
                            {{-- <button type="button"  class="btn mb-1 btn-rounded btn-success" data-toggle="modal" data-target="#downloadData"><span class="btn-icon-left"><i class="fa fa-upload color-success" ></i> </span>Download Data</button> --}}
                            <button type="button" class="btn mb-1 btn-rounded btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="btn-icon-left"><i class="fa fa-upload color-success" ></i> </span>Download Data</button>

                        </div>  
                </div>

                {{-- <div class="bootstrap-modal">
                    <div class="modal fade" id="downloadData">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" >
                                    <label class="mr-sm-2">Download Data</label>
                                    <div class="button-icon">
                                        <form class="form-inline">
                                            <div class="col-lg-1 col-xl-4">    
                                                    <select class="custom-select mr-sm-2 mb-3">
                                                        @foreach ($periode as $d)
                                                            <option value="{{$d->id_periode}}">{{$d->nama_periode}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                            <div class="col-lg-1 col-xl-2">    
                                                <select class="custom-select mr-sm-2 mb-3">
                                                    @foreach ($kecamatan as $kecamatan)
                                                        <option value="{{$kecamatan->kd_kecamatan}}">{{$kecamatan->nama_kecamatan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group mb-1">
                                                <input type="hidden" name="tglawal" id="tglawal" class="form-control" value="{{ $d->tgl_awal}}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="tglakhir" id="tglakhir" class="form-control" value="{{ $d->tgl_akhir}}">
                                            </div>
                                        </form>
                                        <form class="form-inline">
                                            <div class="col-lg-1 col-xl-3"> 
                                                <a href="#" onclick="this.href='/data-pertangal/'+document.getElementById('tglawal').value +
                                                '/' +document.getElementById('tglakhir').value" target="_blank" class="btn mb-1 btn-rounded btn-warning"><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Pdf</a>           
                                            </div>

                                            <div class="col-lg-1 col-xl-2">    
                                                <a class="btn mb-1 btn-rounded btn-success" href={{ route ('penderitaexport') }}><span class="btn-icon-left"><i class="fa fa-upload color-success" ></i> </span>Excel</a>
 
                                            </div>
                                            <div class="input-group mb-1">
                                                <input type="hidden" name="tglawal" id="tglawal" class="form-control" value="{{ $d->tgl_awal}}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="tglakhir" id="tglakhir" class="form-control" value="{{ $d->tgl_akhir}}">
                                            </div>
                                        </form>
                                                                     </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Download Data Sebaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >
                                                    <label class="mr-sm-2">Download Data</label>
                                                    <div class="button-icon">
                                                        <form class="form-inline">
                                                            <div class="col-lg-1 col-xl-2">    
                                                                    <select class="custom-select mr-sm-2 mb-3">
                                                                        @foreach ($periode as $d)
                                                                            <option value="{{$d->id_periode}}">{{$d->nama_periode}}</option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                
                                                            <div class="col-lg-1 col-xl-2">    
                                                                <select class="custom-select mr-sm-2 mb-3" id="fkecamatann">
                                                                    @foreach ($kecamatan as $item)
                                                                        <option value="{{$item->nama_kecamatan}}">{{$item->nama_kecamatan}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            
                                                            <div class="input-group mb-3">
                                                                <input type="hidden" name="fkecamatan" id="fkecamatan" class="form-control" value="{{$item->nama_kecamatan}}">
                                                            </div>
                                                            <div class="input-group mb-1">
                                                                <input type="hidden" name="tglawal" id="tglawal" class="form-control" value="{{ $d->tgl_awal}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <input type="hidden" name="tglakhir" id="tglakhir" class="form-control" value="{{ $d->tgl_akhir}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <input type="hidden" name="fkecamatan" id="fkecamatan" class="form-control" value="{{ $item->nama_kecamatan}}">
                                                            </div>
                                                        </form>
                                                        <form class="form-inline">
                                                            <div class="col-lg-1 col-xl-2"> 
                                                                <a href="#" onclick="this.href='/sebaran-pertangal/'+document.getElementById('tglawal').value +
                                                                '/' +document.getElementById('tglakhir').value +
                                                                '/' +document.getElementById('fkecamatann').value" target="_blank" class="btn mb-1 btn-rounded btn-warning"><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Pdf</a>           
                                                            </div>
                
                                                            <div class="col-lg-1 col-xl-2">    
                                                                <a class="btn mb-1 btn-rounded btn-success" href={{ route ('penderitaexport') }}><span class="btn-icon-left"><i class="fa fa-upload color-success" ></i> </span>Excel</a>
                                                            </div>
                                                        </form>                                 
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            </div>
        </div>
    </div>

    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                <div class="media-body">
                                    <h5 class="mb-0">Sebaran Penderita Stunting</h5>
                                </div>
                            </div>
                            <div class="row mb-12">
                                <div class="">
                                        <div id="map" style='width' 4500; height='90vh' > </div> 
                                </div>
                            </div>

                            <div class="bootstrap-modal">
                                {{-- <button type="button"  id="tombol" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Lihat Detail</button> --}}
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Sebaran Penderita Stunting</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    {{-- <p>
                                                    <canvas id="pendekChart" value="{{$d->kd_kecamatan}}"></canvas>
                                                    </p> --}}
                                                    <p>
                                                    </p>
                                                    <p>
                                                        <canvas id="myChart"></canvas>
                                                    </p>
                                                    <div ><canvas id="region-stat-chart"></canvas></div>
                                                        

                                            </div>
                                            <div class="modal-footer">
                                                <button id="selector" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    </div>

<script>
    
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

// MARKER DATABSE PUSKES
    var puskesLayer;
    $( document ).ready(function(){
        $.getJSON('puskes/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)], {icon: puskesIcon}).bindPopup("Puskesmas : " + (data[index].nama_puskes + "<br  />")).addTo(leafletMap);                                                                                                             
  
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

// MARKER DATABASE KECAMATAN
    var kecamatanLayer;
    $( document ).ready(function(){
        $.getJSON('kecamatan/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)], {icon: puskesIcon}).bindPopup("Kecamtan : " + (data[index].nama_kecamatan + "<br  />" )).addTo(leafletMap);                                                                                                             
  
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
                                        sangat[index] = "";

                                    }
                                    }

                        $(".modal.body").append($("<canvas>").attr("id","region-stat-chart"));
                                        // $( ".selector" ).dialog({ dialogClass: 'no-close' , closeOnEscape: false,});
                        $('#exampleModalLong').modal('show');
                                    var ctx = document.getElementById("region-stat-chart").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [<?php for ($i=6; $i >= 0 ; $i--) { ?> element[<?= $i?>], <?php } ?>],
                                        datasets: [{
                                            label: 'Balita Pendek',
                                            data: [<?php for ($i=6; $i >= 0 ; $i--) { ?> total[<?= $i?>], <?php } ?>],
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
                                  return myChart;

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

 // layer.on('click', (e)=>{
    //                 $.getJSON('titik/data/'+feature.properties.kd_kecamatan, function(detail){
    //                     $.each(detail, function(index){
    //                         $('#exampleModalLong').modal('show');
    //                         var data = {
    //                                 // labels:[detail[index].kd_desa],
    //                                 labels: [@foreach ($lokasi as $data) '{{$data->nama_desa}}',@endforeach],

    //                                 datasets: [{
    //                                     label: 'Balita Pendek',
    //                                     // data: [detail[index].jumlah], 
    //                                 data: [@foreach ($lokasi as $data)'{{$data->total_pendek  }}',@endforeach],

    //                                     backgroundColor: [
    //                                     'rgba(255, 26, 104, 0.2)',
    //                                     'rgba(54, 162, 235, 0.2)',
    //                                     'rgba(255, 206, 86, 0.2)',
    //                                     'rgba(75, 192, 192, 0.2)',
    //                                     'rgba(153, 102, 255, 0.2)',
    //                                     'rgba(255, 159, 64, 0.2)',
    //                                     'rgba(0, 0, 0, 0.2)'
    //                                     ],
    //                                     borderColor: [
    //                                     'rgba(255, 26, 104, 1)',
    //                                     'rgba(54, 162, 235, 1)',
    //                                     'rgba(255, 206, 86, 1)',
    //                                     'rgba(75, 192, 192, 1)',
    //                                     'rgba(153, 102, 255, 1)',
    //                                     'rgba(255, 159, 64, 1)',
    //                                     'rgba(0, 0, 0, 1)'
    //                                     ],
    //                                     borderWidth: 1
    //                                 }]
    //                                 };  

    //                                 // config 
    //                                 var config = {
    //                                 type: 'bar',
    //                                 data,
    //                                 options: {
    //                                     indexAxis: 'y', 
    //                                     scales: {
    //                                     y: {
    //                                         beginAtZero: true
    //                                     }
    //                                     }
    //                                 }
    //                                 };
                                    
    //                                 // render init block
    //                                 var pendekChart = new Chart(
    //                                 document.getElementById('pendekChart'),
    //                                 config
    //                                 );

    //                                 var ctx = document.getElementById("myChart").getContext('2d');
    //                                 var myChart = new Chart(ctx, {
    //                                 type: 'bar',
    //                                 data: {
    //                                     labels: [@foreach ($lokasi as $d) '{{$d->nama_desa}}',@endforeach],
    //                                     datasets: [{
    //                                         label: 'Balita Sangat Pendek',
    //                                         data: [@foreach ($lokasi as $d) '{{$d->sangat_pendek}}',@endforeach],
    //                                         backgroundColor: [
    //                                         'rgba(255, 99, 132, 0.2)',
    //                                         'rgba(54, 162, 235, 0.2)',
    //                                         'rgba(255, 206, 86, 0.2)',
    //                                         'rgba(75, 192, 192, 0.2)',
    //                                         'rgba(153, 102, 255, 0.2)',
    //                                         'rgba(255, 159, 64, 0.2)'
    //                                         ],
    //                                         borderColor: [
    //                                         'rgba(255,99,132,1)',
    //                                         'rgba(54, 162, 235, 1)',
    //                                         'rgba(255, 206, 86, 1)',
    //                                         'rgba(75, 192, 192, 1)',
    //                                         'rgba(153, 102, 255, 1)',
    //                                         'rgba(255, 159, 64, 1)'
    //                                         ],
    //                                         borderWidth: 1
    //                                     }]
    //                                 },
    //                                 options: {
    //                                     indexAxis: 'y', 
    //                                     scales: {
    //                                     y: {
    //                                         beginAtZero: true
    //                                     }
    //                                     }
    //                                 }
    //                               });

    //                         L.popup()

    //                                 .setLatLng(layer.getBounds().getCenter())
    //                                 .setContent(pendekChart,myChart)
    //                                 .openOn(leafletMap);
    //                     });
    //                 });
    //             })

                layer.addTo(leafletMap);  
            }
        });

                   
    
    })



    function cari(kd_kecamatan){
        geoLayer.eachLayer(function(layer){
            if(layer.feature.properties.kd_kecamatan==kd_kecamatan){
                leafletMap.flyTo(layer.getBounds().getCenter(), 13);
                layer.bindPopup(layer.feature.properties.nama_kecamatan);
            }
        });
    }     
    function pdfcetak(){
        alert(1);
    }       
</script>

@endsection

        