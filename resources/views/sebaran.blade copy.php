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
<div class="ex-basic-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <div class="media-body">
                                <h3 class="mb-0">Sebaran Penderita Stunting</h3>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="card" >
                                    <div id="mapid" style="height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            {{-- <form action="#" class="form-profile">
                                <div class="form-group">
                                    <textarea class="form-control" name="textarea" id="textarea" cols="30" rows="2" placeholder="Post a new message"></textarea>
                                </div>
                                <div class="d-flex align-items-center">
                                    <ul class="mb-0 form-profile__icons">
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-user"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-paper-plane"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-camera"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-smile"></i></button>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary px-3 ml-4">Send</button>
                                </div>
                            </form> --}}
                                <div class="input-group rounded">
                                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <span class="input-group-text border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                    </span>
                                </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Download Data</h4>
                            <div class="button-icon">
                                <button type="button" class="btn mb-1 btn-rounded btn-warning"><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Download Pdf</button>
                                <button type="button" class="btn mb-1 btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-upload color-success"></i> </span>Download Excel</button>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>


<?php
$kecamatan = [
            "Buntulia"=>"#ff0000",
			 "DENGILO"=>"#041C32",
			 "DUHIADAA"=>"#A13333",
			 "Lemito"=>"#B3541E",
			 "Marisa"=>"#864879",
			 "PAGUAT"=>"#1E5128",
			 "PATILANGGIO"=>"#FEC260",
			 "POPAYATO"=>"#261C2C",

			];

?>

    <script type="text/javascript" src="webmap/js/leaflet.ajax.js"></script>
    <script type="text/javascript" src="webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
    <script >

    
    var mymap = L.map('mapid').setView([0.6665875, 121.647892], 10 );
    var marker = L.marker([0.5768258927040604, 123.30124678765593]).addTo(mymap);

    var layerkita=L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	});
    mymap.addLayer(layerkita);
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
        l.bindPopup(out.join("<br />"));
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
			layer: new L.GeoJSON.AJAX(["webmap/geojson/'.$key.'.geojson"],{onEachFeature:popUp,style: myStyle'.$key.',pointToLayer: featureToMarker }).addTo(mymap)
			}';
		}
	?>

	var overLayers = [
		<?=implode(',', $arrayKec);?>
	];
var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);

mymap.addControl(panelLayers);




    </script>

@endsection