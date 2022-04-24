
<?php
session_start();
include 'settingsBDD.php';

if(isset($_POST["submit"])){
    

    $email = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);
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
            $_SESSION['idCompte'] = $data[0]['idCompte'];
            header('Location: profile.php');
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