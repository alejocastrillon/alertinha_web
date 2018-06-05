<!DOCTYPE html>
<html>
    <head>
        <title>Alertiña - Sistema de Alerta</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <script>
            var map;
            var api_key = AIzaSyC1IawGBTs9czH6jkUoNHyUnOYoj5Df110;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 4.8133300, lng: -75.6961100},
                    zoom: 10
                });

                function addMarker(lat, lng, info) {
                    var pt = new google.maps.LatLng(lat, lng);
                    marker = new google.maps.Marker({
                        position: pt,
                        map: map,
                        title: 'Alerta '+info
                    });
                }

                updateMarkers();
                function updateMarkers() {
                    $.ajax({
                        type: 'GET',
                        url: "controllers/allalerts.php",
                        success: function (data, textStatus, jqXHR) {
                            var json_obj = jQuery.parseJSON(JSON.stringify(data));
                            console.log(json_obj);
                            for (var i in json_obj)
                            {
                                console.log(i);
                                addMarker(json_obj[i].latitud, json_obj[i].longitud, json_obj[i].idalertas);

                            }
                        },
                        dataType: 'json'
                    });
                }

                var my = setInterval(updateMarkers, 3000);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1IawGBTs9czH6jkUoNHyUnOYoj5Df110&callback=initMap"
        async defer></script>
    </body>
</html>