<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
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
        
        <?php
        require_once 'controllers/allalerts.php';
        $i = 0;
        foreach ($dataalerta as $value) {
            echo "var lat".$i." = {lat:".$value->getLatitud().", lng: ".$value->getLongitud()."};";
            echo "var marker =new google.maps.Marker({position: lat".$i.", map: map, title: 'Alerta ".$i."'});";
            $i++;
        }
        ?>
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1IawGBTs9czH6jkUoNHyUnOYoj5Df110&callback=initMap"
    async defer></script>
  </body>
</html>