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
<div class="ex-basic-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-3">
                            <div class="media-body">
                                <h5 class="mb-0">Sebaran Penderita Stunting</h5>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col">
                                    <div id="map" style='width' 80%; height='80vh' > </div> 
                            </div>
                        </div>

                        <div class="bootstrap-modal">
                            <!-- Modal -->
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <canvas id="myChart"></canvas>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        </div>
                                    </div>
                                </div>
                            {{-- </div> --}}
                            </div>
                        </div>
                            {{-- </canvas> --}}
                    </div>
                </div>  
            </div>
            <div class="col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                                                        <div>
                                                                <label class="mr-sm-2">Pilih Kecamatan</label>
                                                                <select class="custom-select mr-sm-2" onchange="cari(this.value)">
                                                                 @foreach ($lokasi as $d)
                                                                    <option value="{{$d->kd_kecamatan}}">{{$d->nama_kecamatan}}</option>
                                                                 @endforeach
                                                                </select>
                                                        </div>
                                                        <br>    
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Download Data</h4>
                            <div class="button-icon">
                                <a class="btn mb-1 btn-rounded btn-success" href={{ route ('penderitaexport') }}><span class="btn-icon-left"><i class="fa fa-upload color-success" ></i> </span>Download Excel</a>
                                <a class="btn mb-1 btn-rounded btn-warning" href={{ route ('penderitapdf') }}><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Download Pdf</a>
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
            layer.on('mouseover', (e)=>{
                $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                    $.each(detail, function(index){
                        // alert(detail[index].nama_kecamatan);
                        var html='<h6>Nama Kecamatan : '+detail[index].nama_kecamatan+'<h6>';
                            html+='<h6> Total Stunting : '+detail[index].total+'<h6>';
                            html+='<h6> Pendek : '+detail[index].total_pendek+'<h6>';
                            html+='<h6> Sangat Pendek : '+detail[index].sangat_pendek+'<h6>';
                            html+='<h6> <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Lihat Detail</button> <h6>';
                        L.popup()

                                .setLatLng(layer.getBounds().getCenter())
                                .setContent(html,myChart)
                                .openOn(leafletMap);
                    });
                });
                
            });
            layer.addTo(leafletMap);
            
            L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(leafletMap);
            layer.on('click', (e)=>{
                $.getJSON('titik/data/'+feature.properties.kd_kecamatan, function(detail){
                    $.each(detail, function(index){
                        // alert(detail[index].nama_kecamatan);
                        
                        var html='<h6> <button type="button"  id="tombol" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Lihat Detail</button> <h6>';
                            // html+='<h6> Total Stunting : '+detail[index].kd_desa+'<h6>';
                                

                                var data = {

                                // labels: [detail[index].kd_desa,],
                                 labels: [@foreach ($lokasi as $data)
                                '{{$data->nama_desa}}',@endforeach],

                                datasets: [{
                                    label: 'Total Stunting',
                                    // data: [detail[index].jumlah], 
                                     data: [@foreach ($lokasi as $data)
                                '{{$data->total}}',@endforeach],

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
                                var myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                                );
          
                        L.popup()

                                .setLatLng(layer.getBounds().getCenter())
                                .setContent(html,myChart)
                                .openOn(leafletMap);
                    });
                });
            })
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

            
</script>

@endsection

        