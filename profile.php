<?php
include 'settingsBDD.php';
include 'access.php';
print $_COOKIE['validation'];
if(($_SESSION['idCompte']or $userinfo['email'] ) and isset($_COOKIE['validation']))
{
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./_navbar.css">
    <link rel="stylesheet" href="./_global.css">
    <link rel="stylesheet" href="./_profile.css">
    <script src="./navbar.js" defer></script>
    <title>Profile</title>
</head>

<body>

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
        <div class="all">
            <h2 id="titre">Votre profil</h2>
            <div class="feuille">

                <div class="part1">
                    <?php
                    if (!empty($userinfo['avatar'])) {
                    ?>
                        <span>
                            <img class="PP" src="./avatars/<?php echo $userinfo['avatar'] ?>" alt="image de profile">
                        </span>
                    <?php
                    } else {
                    ?>
                        <span>
                            <img class="PP" src="./images/photo-profil.jpg" alt="image de profile de base">
                        </span>
                    <?php
                    }
                    ?>
                    <div class="texte">
                        <h3 class="intit">Nom </h3>
                        <p class="content"><?php echo $userinfo['nom'] ?></p>
                        <h3 class="intit">Prénom </h3>
                        <p class="content"><?php echo $userinfo['prenom'] ?></p>
                    </div>
                </div>
                <div class="part2">
                    <div class="info">
                    <h3 class="intit">Age </h3>
                    <p class="content"><?php echo $userinfo['age'] ?></p>
                    <h3 class="intit">Numéro de téléphone </h3>
                    <p class="content"><?php echo $userinfo['tel'] ?></p>
                    <h3 class="intit">Adresse mail </h3>
                    <p class="content"><?php echo $userinfo['email'] ?></p>

                    </div>
                    <div class="local">
                    <h3 class="intit">Ville </h3>
                    <p class="content"><?php echo $localinfo['ville'] ?></p>
                    <h3 class="intit">Adresse </h3>
                    <p class="content"><?php echo $localinfo['adresse'] ?></p>
                    <h3 class="intit">Code Postal</h3>
                    <p class="content"><?php echo $localinfo['code_postal'] ?></p>
                    </div>
                </div>

            </div>
            <div class="editdiv"><a class="edita" href="./editprofile.php">Modifier votre profil</a>
            </div>
        </div>
        
        


    </main>
</body>

</html>
<?php
}

else{
    header('Location: connection.php');
}

?>