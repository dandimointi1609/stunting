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
                        <h4 class="card-title">Penderita Stunting</h4>
                        <div class="table-responsive">
                            <div class="card-body">
                                <div>
                                    <p> Cari Lokasi </p>
                                    {{-- <select onchange="cari(this.value)">
                                        @foreach ($lokasi as $d)
                                        <option value="{{$d->kd_kecamatan}}">{{$d->nama_kecamatan}}<option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                
                                <br />
                                <div>
                                    <div id="map"  style='width' 100%; height='80vh' >
                                    
                                    </div>
                                    {{-- <div style="width: 400px;">
                                        <canvas id="myChart"></canvas>
                                    </div>  --}}
                                </div>
                                {{-- <div id="fcc" class="fcc">
                                    <a href="#" onclick="hideChart()">x</a>
                                    <div id="fc" class="fc" />
                                  </div>
                                  <div id="pcc" class="pcc"></div> --}}
                                <br/>
                                {{-- <div style="width: 600px;" >
                                    <canvas id="myChart"></canvas>
                                </div>  --}}
                                 
                                   
                                {{-- modal --}}
                                {{-- <div class="modal fade bd-example-modal-lg" id="myChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
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
                                                                
                                                    </thead>
                                                            <tbody>
                                                        
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <canvas> --}}
                                        <div class="bootstrap-modal">
                                            <!-- Button trigger modal -->
                                            {{-- <div id="tombol"> --}}
                                            <button type="button"  id="tombol" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Basic modal</button>
                    
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
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <script type="text/javascript" src="webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script> --}}

{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<script>
//         var leafletMap,
//   data = [
//     [
//       { label: "apple0", y: 9 },
//       { label: "orange0", y: 6 },
//       { label: "banana0", y: 25 }
//     ],
//     [
//       { label: "apple1", y: 25 },
//       { label: "orange1", y: 45 },
//       { label: "banana1", y: 8 }
//     ],
//     [
//       { label: "apple2", y: 55 },
//       { label: "orange2", y: 85 },
//       { label: "banana2", y: 8 }
//     ]
//   ];
// init();

// function init() {
    
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

    //MARKER
    // var marker L.marker([0.6665875, 121.647892], {icon: puskesIcon}).addTo(leafletMap);
    // var marker = L.marker([0.6665875, 121.647892], {icon: puskesIcon}).addTo(leafletMap).on('click', function(e){
    //     alert(e.latlng);
    // });

    // marker.bindPopup("<b>Hello word!</b>").openPopup();

    //POLYLINE
        // var latlngs = [
        //     [45.51, -122.68],
        //     [37.77, -122.43],
        //     [34.04, -118.2]
        // ];
        // var polyline = L.polyline(latlngs, {color: 'red'}).addTo(leafletMap);
        // polyline.setStyle(
        //     {
        //         weight:25,
        //         lineCap:'round',
        //         opacity:0.5
        //     }
        // )
        // leafletMap.fitBounds(polyline.getBounds());

        // polyline.on('click', (e)=>{
        //     // alert(e.latlng);
        //     polyline.setStyle({
                
        //         color: 'yellow'
        //     });
        // })


        //POLYGON
        // var latlngs = [
            // [
            //     0.7470491450051796,
            //   482.5916290283203
            // ],
            // [
            //     0.6701507351859315,
            //     482.5827026367187
            // ],
            // [
            //     0.7113464708253319,
            //     482.6836395263672
            // ],
            // [
            //     0.7470491450051796,
            //     482.5916290283203
            // ]
        // ];

        //     var polygon = L.polygon(latlngs, {color: 'red'}).addTo(leafletMap);
        //     polygon.setStyle(
        //     {
        //         color:'yellow',
        //         weight:2,
        //         lineCap:'square',
        //         opacity:0.3,
        //         fillColor:'#1a7f91'
        //     }
        // );

        //     // zoom the map to the polygon
        //     leafletMap.fitBounds(polygon.getBounds());
        //     polygon.on('click', (e)=>{
        //     alert(e.latlng);

        // })

    //     MARKER DATABSE
    $( document ).ready(function(){
        $.getJSON('puskes/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)], {icon: puskesIcon}).bindPopup("Kecamatan : " + (data[index].nama_kecamatan + "<br  />" 
                                                                                                           + " Total Stunting : "+ data[index].total 
                                                                                                           + "<br  />" +" Pendek : "+ data[index].total_pendek
                                                                                                           + "<br  />" +" Sangat Pendek : "+ data[index].sangat_pendek
                                                                                                           + "<br  />" +" Pravelensi : "+ data[index].total )).addTo(leafletMap);                                                                                                             
  
            });
        });
    });



    // $.getJSON('/webmap/geojson/map.geojson', function(json) {
    //  geoLayer = L.geojson(json, {
    //         style: function(feature) {
    //             return{
    //                 fillOpacity: 0.3,
    //                 weight: 5,
    //                 opacity: 1,
    //                 color: "#008cff"
    //             };
    // //         },
    //         onEachFeature: function(features, layer) {
    //             layer.addTo(leafletMap);
    //         }
    //     });
    // })

    //GEOJSON DATABASE
    var geoLayer;
    $.getJSON('assets/pohuwato.geojson', function(json){
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

                        L.popup()

                                .setLatLng(layer.getBounds().getCenter())
                                .setContent(html)
                                .openOn(leafletMap);
                    });
                });

                
            })

            layer.on('click', (e)=>{
                
                $.getJSON('titik/lokasi/'+feature.properties.kd_kecamatan, function(detail){
                    $.each(detail, function(index){
                        // alert(detail[index].nama_kecamatan);
                        
                        var html='<h6> <button type="button"  id="tombol" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Lihat Detail</button> <h6>';
                                

                                var data = {
                                labels: [detail[index].nama_desa],
                                // labels: [@foreach ($lokasi as $data)
                                // '{{$data->nama_desa}}',@endforeach],


                                datasets: [{
                                    label: 'Total Stunting',
                                    // data: [detail[index].total],
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
                                const config = {
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
                                const myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                                );

                        
                                
                        L.popup()

                                .setLatLng(layer.getBounds().getCenter())
                                .setContent(html,data)
                                .openOn(leafletMap);
                    });
                });
            })
                layer.addTo(leafletMap);
            }
        });
    })
    
    // function cari(kd_kecamatan){
    //     geoLayer.eachLayer(function(layer){
    //         if(layer.feature.properties.kd_kecamatan==kd_kecamatan){
    //             leafletMap.flyTo(layer.getBounds().getCenter(), 13);
    //             layer.bindPopup(layer.feature.properties.nama_kecamatan);
    //         }
    //     });
    // }  

//     var ctx = document.getElementById('myChart').getContext('2d');

//     var myChart = new Chart(ctx, {
//  //chart akan ditampilkan sebagai bar chart
//     type: 'bar',
//     data: {
//      //membuat label chart
//         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//         datasets: [{
//             label: '# of Votes',
//             //isi chart
//             data: [12, 19, 3, 5, 2, 3],
//             //membuat warna pada bar chart
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255, 99, 132, 1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });
                    

</script>

@endsection

        