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
                                    <select onchange="cari(this.value)">
                                        @foreach ($lokasi as $d)
                                        <option value="{{$d->kd_kecamatan}}">{{$d->nama_kecamatan}}<option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <br />

                                <div id="map" style='width' 100%; height='80vh' > </div> 
                            </div>
                          
                        </div>
                    </div>
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


<script type="text/javascript" src="webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>

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

    var layerkita = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(leafletMap);

    leafletMap.addLayer(layerkita);
    var myStyle2 = {
	    "color": "#ffff00",
	    "weight": 1,
	    "opacity": 0.9
	};

    function popUp(f,l){
    var out = [];
    if (f.properties){
        for(key in f.properties){
            out.push(key+": "+f.properties[key]);
        }
        l.bindTooltip(out.join("<br  />"));
    }
}

// Legenda

function iconByName(name) {
	return '<i class="icon icon-'+name+'"></i>';
}

function featureToMarker(feature, latlng) {
	return L.marker(latlng, {
		icon: L.divIcon({
			className: 'marker-'+feature.properties.amenity,
			html: iconByName(feature.properties.amenity),
			iconUrl: '../webmap/images/markers/'+feature.properties.amenity+'.png',
			iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -34],
			shadowSize: [41, 41]
		})
	});
}

var baseLayers = [
	{
		name: "OpenStreetMap",
		layer: layerkita
	},
	{
		name: "OpenCycleMap",
		layer: L.tileLayer('https://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
	},
	{
		name: "Outdoors",
		layer: L.tileLayer('https://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
	}
];

    var geoLayer;
    $( document ).ready(function(){
        $.getJSON('titik/json/', function(data){
            $.each(data, function(index){                
                L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)]).bindPopup("Kecamatan : " + (data[index].nama_kecamatan + "<br  />" 
                                                                                                           + " Total Stunting : "+ data[index].total 
                                                                                                           + "<br  />" +" Pendek : "+ data[index].total_pendek
                                                                                                           + "<br  />" +" Sangat Pendek : "+ data[index].sangat_pendek
                                                                                                           + "<br  />" +" Pravelensi : "+ data[index].total )).addTo(leafletMap);                                                                                                             

  
  
            });
        });
    });
    
    <?php
		foreach ($kecamatan as $key => $value) {
			?>

			var myStyle<?=$key?> = {
			    "color": "<?=$value?>",
			    "weight": 1,
			    "opacity": 0.9
			};

			<?php
			$arrayKec[]='{
			name: "'.str_replace('_', ' ', $key).'",
			icon: iconByName("bar"),
			layer: new L.GeoJSON.AJAX(["webmap/geojson/'.$key.'.geojson"],{onEachFeature:popUp,style: myStyle'.$key.',pointToLayer: featureToMarker }).addTo(leafletMap)
			}';
		}
	?>

	var overLayers = [
		<?=implode(',', $arrayKec);?>
	];

    const search = new GeoSearch.GeoSearchControl({
        provider: providerOSM,
        style: 'bar',
        searchLabel: 'Pohuwato',
    });

    function cari(kd_kecamatan){
        geoLayer.eachLayer(function(layer){
            if(layer.feature.properties.kd_kecamatan==kd_kecamatan){
            map.flyTo(layer.getBounds().getCenter(), 19);
            layer.bindPopup(layer.feature.properties.nama_kecamatan)
            }
        });
    }
    

    leafletMap.addControl(search);
    var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);

    leafletMap.addControl(panelLayers);

</script>

@endsection

        