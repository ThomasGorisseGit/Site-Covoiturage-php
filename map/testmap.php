<?php
include '../values.php';
include '../settingsBDD.php';

$stmt= "SELECT longitude FROM Localisation";
$req = $db->prepare($stmt);
$req -> execute();
$data = $req->fetch(PDO::FETCH_ASSOC);

?>
<html>
  <head>
    <title>Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <script type="module" src="./script/map.js"></script>

  </head>
  <body>
    <div id="demo"></div>
    <div id="map"></div>
    <?php

?>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD39_LfkB6MnorIT-zfvqtGK4RJWiTQew&callback=initMap&v=weekly"
      defer
    ></script>
    <script src="https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDD39_LfkB6MnorIT-zfvqtGK4RJWiTQew"></script>

  
  </body>
</html>
