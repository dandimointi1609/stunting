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
                            // labels: [detail[index].nama_desa],
                            // labels: [@foreach ($lokasi as $data)
                            // '{{$data->nama_desa}}',@endforeach],


                            datasets: [{
                                label: 'Total Stunting',
                                // data: [detail[index].total],
                            //     data: [@foreach ($lokasi as $data)
                            // '{{$data->total}}',@endforeach],
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
