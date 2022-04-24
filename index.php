<?php
session_start();
include 'settingsBDD.php';

if(isset($_SESSION['mail'])){
  $req = $db ->prepare('SELECT avatar FROM Compte WHERE idCompte = :idCompte');
  $req->execute(array('idCompte'=>$_SESSION['idCompte']));
  $userinfo= $req->fetch();
}

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
   
   if(isset($_SESSION['latitude'])){

    
    ?>

    
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
    <a href="./deconnexion.php">
      <input type="button" value="Se déconnecter"class="button-connection">
    </a>
    <span>
        <a href="./portail.php">
          <?php
          if(!empty($userinfo['avatar'])){
            ?>
            <img class="PP" src="./avatars/<?php echo $userinfo['avatar'] ?>" alt="photo de profil">
            <?php
          }else{
            ?>
            <img class="PP"src="./images/photo-profil.jpg" alt="photo de profile">
            <?php
          }
          
          ?>

        </a>
      </span>
    </div>
  </div>



  <?php
   }
   else{
      header('Location: ./updatepos.php');
   }
}
  else {
    ?>
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

    </div>
  </div>
  <?php
  }
  ?>
  <header>

    <nav class="navbar">
      <form class="search" role="search" id="form">
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
  <main>
    <a href="./test.php">Test</a>
    <a href="./map/testmap.php">Maps</a>
    <a href="./entrainnement/index.html">Entrainnement</a>
  </main>


</body>

</html>