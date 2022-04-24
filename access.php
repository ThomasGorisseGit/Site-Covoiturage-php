<?php
include 'values.php';
global $validation;
$_COOKIE['validation'] = false;
    if (isset($_POST['mdp'])) {
            
            $mdp = $_POST['mdp'];
            if (password_verify($mdp, $userinfo['motDePasse'])) {
                $_COOKIE['validation']=true;
                print $_COOKIE['validation'];
                header('Location: ./profile.php');
            } else {
                print "<script type='text/javascript'>
                        alert('Mot de passe incorrect');
                         </script>";
                         ?>
                <a href="./index.php">Retour vers l'accueil</a>
                <?php
        }
    }
?>