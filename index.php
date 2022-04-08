<?php
session_start();
include 'settingsBDD.php';
?>


<!DOCTYPE html>
<html>

<head>
  <title>Cocovoit</title>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/handlebars/4.7.7/handlebars.min.js"></script>
  <link href="./_global.css" rel="stylesheet">
  <link rel="stylesheet" href="./_title.css">
  <link rel="stylesheet" href="./_navbar.css">
  <script src="./navbar.js" defer></script>

  <script>
    const CONFIGURATION = {
      "locations": [
        { "title": "Death Valley National Park", "address1": "California", "address2": "United States", "coords": { "lat": 43.610285322730235, "lng": 6.969237553489911 }, "placeId": "ChIJR4qudndLx4ARVLDye3zwycw" },
      ],
      "mapOptions": { "center": { "lat": 38.0, "lng": -100.0 }, "fullscreenControl": true, "mapTypeControl": false, "streetViewControl": false, "zoom": 4, "zoomControl": true, "maxZoom": 17 },
      "mapsApiKey": "AIzaSyDyVDavFhu8bl56YcbMycj-5S7S9HcaXWI",
      "capabilities": { "input": true, "autocomplete": false, "directions": false, "distanceMatrix": false, "details": false }
    };

    function initMap() {
      new LocatorPlus(CONFIGURATION);
    }
  </script>
  <script id="locator-result-items-tmpl" type="text/x-handlebars-template">
      {{#each locations}}
        <li class="location-result" data-location-index="{{index}}">
          <button class="select-location">
            <h2 class="name">{{title}}</h2>
          </button>
          <div class="address">{{address1}}<br>{{address2}}</div>
        </li>
      {{/each}}
    </script>
</head>

<body>
<?php
  if( isset($_SESSION['login'])){
    print'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
  }
  ?>
  <header>
    <div class="pre-navbar">
      <span>
        <div class="brand-title">

          <img class="logo" src="./images/logo4.png" alt="logo">
          <div>
            <h1 class="global-title">Covoiturage</h1>
            <h3 id="slogan"> <em>Plus proche, plus vite, moins cher</em> </h3>
          </div>
        </div>
      </span>

      <div class="connection">
<a href="./connection.php">
        <input type="button"  value="Se connecter" class="button-connection">
      </a>
      <a href="./inscription.php">
        <input type="button" value="S'inscrire" class="button-inscription">
      </a>
        <span>
          <a href="./profile.php">
            <img class="logo" src="./images/logo4.png" alt="logo">
          </a>
        </span>
      </div>
    </div>
    <nav class="navbar">
      <form role="search" id="form">
        <input type="search" class="research" name="q" placeholder="Rechercher un covoiturage !"
          aria-label="Search through site content">
        <button>
          <svg viewBox="0 0 1024 1024">
            <path class="path1"
              d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z">
            </path>
          </svg>
        </button>
      </form>
      <a href="#" class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </a>
      <div class="navbar-links">

        <ul>

          <li class="navbar-li"><a class="active" href="./index.php">Accueil</a></li>
          <li class="navbar-li"><a href="#">About</a></li>
          <li class="navbar-li"><a href="#">Contact</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- <div id="map-container">
      <div id="locations-panel">
        <div id="locations-panel-list">
          <header>
            <h1 class="search-title">
              <img src="https://fonts.gstatic.com/s/i/googlematerialicons/place/v15/24px.svg"/>
              Find a location near you
            </h1>
            <div class="search-input">
              <input id="location-search-input" placeholder="Enter your address or zip code">
              <div id="search-overlay-search" class="search-input-overlay search">
                <button id="location-search-button">
                  <img class="icon" src="https://fonts.gstatic.com/s/i/googlematerialicons/search/v11/24px.svg" alt="Search"/>
                </button>
              </div>
            </div>
          </header>
          <div class="section-name" id="location-results-section-name">
            All locations
          </div>
          <div class="results">
            <ul id="location-results-list"></ul>
          </div>
        </div>
      </div>
      <div id="map"></div>
    </div>
    <div class="test"><h1>Hellllllo</h1></div> -->

  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyVDavFhu8bl56YcbMycj-5S7S9HcaXWI&callback=initMap&libraries=places,geometry&solution_channel=GMP_QB_locatorplus_v4_cA"
    async defer></script>
</body>

</html>