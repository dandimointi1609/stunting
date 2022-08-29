<?php
$kecamatan = [
			"Bone"=>"#ff0000",
			 "Bone_Raya"=>"#041C32",
			 "Bone_Pantai"=>"#A13333",
			 "Pinogu"=>"#B3541E",
			 "Botupingge"=>"#864879",
			 "Bulango_Selatan"=>"#1E5128",
			 "Bulango_Timur"=>"#FEC260",
			 "Bulango_Ulu"=>"#261C2C",
			 "Bulango_Utara"=>"#082032",
			 "Bulawa"=>"#362222",
			 "Kabila"=>"#1597BB",
			 "Kabila_Bone"=>"#39311D",
			 "Suwawa"=>"#52057B",
			 "Suwawa_Selatan"=>"#A05344",
			 "Suwawa_Tengah"=>"#7D0633",
			 "Suwawa_Timur"=>"#1A1A2E",
			 "Tapa"=>"#150485",
			 "Tilongkabila"=>"#3B5249",

			];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar GIS</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
    <link rel="stylesheet" href="webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
</head>
<body>
    <div id="mapid" style="width: 1000px; height: 700px;"></div>
</body>
    <script type="text/javascript" src="webmap/js/leaflet.ajax.js"></script>
    <script type="text/javascript" src="webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
    <script >
    
    var mymap = L.map('mapid').setView([0.5768258927040604, 123.30124678765593], 10 );
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
			iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
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
			layer: new L.GeoJSON.AJAX(["geojson/'.$key.'.geojson"],{onEachFeature:popUp,style: myStyle'.$key.',pointToLayer: featureToMarker }).addTo(mymap)
			}';
		}
	?>

	var overLayers = [
		<?=implode(',', $arrayKec);?>
	];
var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);

mymap.addControl(panelLayers);

    </script>
</html>