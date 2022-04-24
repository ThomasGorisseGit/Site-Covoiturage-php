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
    <title>Modifier votre profil</title>
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
            <h2 id="titre">Votre profil</h2>
            <div class="feuille">
                <div class="imgflex">
                    <?php
                        if (!empty($userinfo['avatar'])) {
                            ?>
                                <span>
                                <label for="file-input">
                                    <img class="PP" src="./avatars/<?php echo $userinfo['avatar'] ?>" alt="image de profile">
                                    </label>
                                </span>
                            <?php
                            } 
                            else {
                            ?>
                                <span>
                                <label for="file-input">
                                    <img class="PP" src="./images/photo-profil.jpg" alt="image de profile de base">
                                    </label>
                                </span>
                            <?php
                            }
                        
                        ?>
                    
                    <p> <em> Cliquez sur votre image de profil pour la changer </em></p>
                    <input name="avatar" onchange="form.submit()" id="file-input" style="display:none;" type="file" />
                    <div class="part2">
                        <div class="info">
                            <h3 class="intit">Nom </h3>
                            <input type="text" placeholder="Saisir votre nom" name="nom">

                            <h3 class="intit">Age </h3>
                            <input type="number" placeholder="Saisir votre age" min="13" max="120" name="age" onkeydown="return event.keyCode !== 69">

                            <h3 class="intit">Numéro de téléphone </h3>
                            <input type="number" placeholder="Saisir votre numéro " name="phone">

                            <h3 class="intit">Adresse mail </h3>
                            <input type="email" placeholder="Saisir votre email" name="mail">

                        </div>
                        <div class="local">
                            <h3 class="intit">Prénom </h3>
                            <input type="text" placeholder="Saisir votre prénom" name="prenom">

                            <h3 class="intit">Ville </h3>
                            <input type="text" placeholder="Saisir votre ville" name="ville">
                            <h3 class="intit">Adresse </h3>
                            <input type="text" placeholder="Saisir votre adresse" name="adresse">

                            <h3 class="intit">Code Postal</h3>
                            <input type="number" onkeydown="return event.keyCode !== 69" placeholder="Saisir votre code postal" name="codepostal">
                        </div>

                    </div>

                </div>
            </div>
            <div class="end">
                <a class="modifymdp"href="./changepassword.php"> <em> Cliquez ici afin de changer votre mot de passe </em></a>
                <button class="submit" type="submit">Modifier</button>
            </div>
        </div>
    </form>
</main>
<?php
}
else{
    header('Location: connection.php');
}
?>