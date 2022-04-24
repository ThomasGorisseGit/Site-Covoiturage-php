<?php

include 'settingsBDD.php';
include 'values.php';
if(isset($_SESSION['idCompte'])){


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./_navbar.css">
    <link rel="stylesheet" href="./_global.css">
    <link rel="stylesheet" href="./_editprofile.css">
    <title>Modifier votre mot de passe</title>
</head>
<header>
    <nav class="navbar">
        <form class="search" role="search" id="form">
            <input type="search" class="research" name="q" placeholder="Rechercher un covoiturage !" aria-label="Search through site content">
            <button>
                <svg viewBox="0 0 1024 1024">
                    <path class="path1" d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z">
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
    <form method="POST" enctype="multipart/form-data" action="./editdata.php">
        <div class="all">
            <div class="feuille">
                <h2 class="title">Changer votre mot de passe</h2>
                <label for="password">Saisir votre mot de passe</label>
                <input placeholder = "Mot de passe" type = "password" name = "password" required>
                <label for="password">Confirmer votre mot de passe</label>
                <input  placeholder = "Mot de passe" type = "password" name = "checkpassword" required>

            </div>

            <a href="./mdpOublie.php">Mot de passe oublié</a>
            <div class="end">
                <button class="submit" type="submit">Modifier</button>
            </div>
        </div>
        </div>
    </form>
</main>
<?php
}
else{
    header('Location: connection.php');
}