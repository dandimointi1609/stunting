var map = L.map('map').setView([39.74739, -105], 13);
  
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.light'
	}).addTo(map);
  
var lightRailStop = {
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {
        "popupContent": "18th & California Light Rail Stop"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [-104.98999178409576, 39.74683938093904]
      }
    },{
      "type": "Feature",
      "properties": {
        "popupContent": "20th & Welton Light Rail Stop"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [-104.98689115047453, 39.747924136466565]
      }
    }
  ]
};

var lightRail = L.geoJSON(lightRailStop).addTo(map);

lightRail.on("click", function(evt){
	var content = evt.layer.feature.properties.popupContent;
  var win =  L.control.window(map,{title:'Hello world!',maxWidth:400,modal: true})
  .content(content)
  .prompt({callback:function(){alert('This is called after OK click!')}})
  .show()
})