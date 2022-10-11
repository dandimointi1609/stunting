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
            <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-2 col-xl-4">
                                        <label class="mr-sm-2">Cari Kecamatan</label>
                                   <select class="custom-select mr-sm-2" onchange="cari(this.value)">
                                               @foreach ($lokasi as $d)
                                                          <option value="{{$d->kd_kecamatan}}">{{$d->nama_kecamatan}}</option>
                                                @endforeach
                                    </select>
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
                        <h4 class="card-title">Sebaran Stunting</h4>
                        <div class="table-responsive">
                            <div class="card-body">
                                <div>
                                    <div id="map"  style='width' 100%; height='80vh'>                                  
                                    </div>
                                </div>
                                <br/>
                             </div>              
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@push('scripts')
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

             // MARKER DATABSE PUSKES
             var desaLayer;
    $( document ).ready(function(){
        $.getJSON('desa/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)]).bindPopup(
                                                                                                                                "Desa : " + (data[index].nama_desa + "<br  />" 
                                                                                                  
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
                             html+='<h6><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">deatail</button><h6>';
                         L.popup()
 
                                 .setLatLng(layer.getBounds().getCenter())
                                 .setContent(html,myChart)
                                 .openOn(leafletMap);
                     });
                 });
                 
             });
 
             
 
             layer.on('click', (e)=>{
                 $.getJSON('titik/data/'+feature.properties.kd_kecamatan, function(detail){
                     $.each(detail, function(index){
                         // alert(detail[index].nama_kecamatan);
                     $('#exampleModalLong').modal('show');
                                 var data = {
 
                                 labels: [detail[index].kd_desa,],
                                 //  labels: [@foreach ($lokasi as $data)
                                 // '{{$data->nama_desa}}'+layer.feature.properties.nama_kecamatan,@endforeach],
 
                                 datasets: [{
                                     label: 'Balita Pendek',
                                     data: [detail[index].jumlah], 
                                     //  data: [@foreach ($lokasi as $data)
                                 // '{{$data->total}}'+layer.feature.properties.nama_kecamatan,@endforeach],
 
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
                                 .setContent(myChart)
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
@endpush



        