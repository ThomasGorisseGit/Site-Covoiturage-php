<?php 
session_start();
include 'settingsBDD.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./_connection.css">
    <title>Document</title>
</head>

<body>
    <?php
        if(isset($_SESSION["mail"])){
            echo "vous etes connectés en tant que " . $_SESSION["mail"];
        }
        else {
            ?>
                <form action="gestion-connexion.php" method="POST">
        <h1>Se connecter</h1>
        <p class="choose-email">Utiliser votre adresse mail</p>
        <div class="inputs">
            <input type="email" placeholder="Email" name="mail" required>
            <input type="password" placeholder="Mot de passe" name="mdp" required>
        </div>
        <div class="div-inscription">
            <p class="inscription">Cliquez ici pour
                <a href="./inscription.php">S'inscrire</a>
            </p>
        </div>
        <div class="button-connection">
            <button type="submit" name="submit"> Se connecter</button>
        </div>

    </form>

            <?php
            
        }
    ?>

</body>

</html>