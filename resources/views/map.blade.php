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
                                    <div class="col-lg-2 col-xl-12"> 
                                            <select class="custom-select mr-sm-2" onchange="cari(this.value)">
                                                @foreach ($pencarian as $d)
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
$.getJSON('storage/post-images/BUNTULIA32.geojson', function(json){
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

$.getJSON('storage/post-images/DENGILO51.geojson', function(json){
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

$.getJSON('storage/post-images/DUHIADAA33.geojson', function(json){
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

$.getJSON('storage/post-images/LEMITO20.geojson', function(json){
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

$.getJSON('storage/post-images/MARISA30.geojson', function(json){
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

$.getJSON('storage/post-images/PAGUAT50.geojson', function(json){
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

$.getJSON('storage/post-images/PATILANGGIO31.geojson', function(json){
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

$.getJSON('storage/post-images/POPAYATO10.geojson', function(json){
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
    

      function refreshPage(){
        window.location.reload();
      } 
    
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


{{-- @push('scripts') --}}

    
{{-- // @endpush --}}



        