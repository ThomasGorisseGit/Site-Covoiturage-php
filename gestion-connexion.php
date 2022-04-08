
<?php
session_start();
include 'settingsBDD.php';

if(isset($_POST["submit"])){
    

    $email = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $sql = "SELECT * FROM compte WHERE email = '$email' ";
    $result = $db -> prepare($sql);
    $result->execute();
    if($result->rowCount()>0)
    {
        $data = $result -> fetchAll();
        

        if(password_verify($_POST['mdp'],$data[0]['motDePasse'])){
            echo "connexion effectuée";
            $_SESSION["mail"] = $email;
            $_SESSION["login"] = $data[0]['motDePasse'];
            ?>

            <a href="./index.php">Retourner vers l'accueil</a>
            <?php
        }
        else{
            echo "mot de passe incorrect ... ";
        }
        $result->closeCursor();
    }
    else {
        print "<script type='text/javascript'>
        window.location='connection.php';
        alert('Compte innexistant');
        </script>";
        }
    
    
}



?>