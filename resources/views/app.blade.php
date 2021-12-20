<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.0/dist/L.Control.Locate.min.css" />

   <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        #map{
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('marker.js') }}"></script> --}}
    <script>
         
        var map = L.map('map').setView([28.3949, 84.1240], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.Control.geocoder().addTo(map);
        L.control.locate().addTo(map);
        let marker;
        let html;
        $(document).ready(function(){
            $.getJSON('/data',function(data){
                $.each(data, function(index){
                    var hotelIcon = L.icon({
                        iconUrl: 'https://cdn-icons.flaticon.com/png/512/1946/premium/1946788.png?token=exp=1639965599~hmac=e8fcfd168f7ad6f36588b4d93644892c',
                        iconSize: [24,28],
                        shadowSize: [50,64]
                    });
                    // alert(data[index].longitude + " " +data[index].latitude);
                    html = '<div>';
                    html += '<img height="100px" src="public/image/'+data[index].image+'" alt="Images">';
                    html += '../../public/image/'+ data[index].image;
                    html += '<h3>';
                    html += data[index].name;
                    html += '</h3>';
                    html += '<a href="/data">';
                    html += 'Button';
                    html += '</a>';
                    html += '</div>';
                    marker = L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)],{icon: hotelIcon}).addTo(map);
                    marker.bindPopup(html);
                });
            });
        });
       

    //    For Json Data
    //     L.geoJSON(markerJson,{
    //     onEachFeature: function(feature,layer){
    //         layer.bindPopup(feature.properties.location)
    //     }
    //    }).addTo(map);
     
    </script>
</body>
</html>