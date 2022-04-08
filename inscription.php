<?php
include "settingsBDD.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./_inscription.css">
</head>

<body>
 

    <form action="./inscription.php" method="POST">
        <div class="title">
            <h1>Inscription</h1>
            <p> <em> Afin d'accéder aux fonctionnalitées du site, veuillez créer un compte </em></p>
        </div>
        <hr class="rounded">
        <div class="field">       
            <form method="POST">
            <label for="Nom">Nom :</label>
            <input type="text" placeholder="Saisir votre nom" name = "nom" required>
            <label for="prenom">Prénom :</label>
            <input type="text" placeholder="Saisir votre prénom" name="prenom" required>


            <label for="age">Age :</label>
            <input type="number" placeholder="Saisir votre age" min="13" max ="120" name="age" onkeydown="return event.keyCode !== 69" required> 

            <label for="emil">Email :</label>
            <input type="email" placeholder="Saisir votre email" name="mail" required>
            <label for="tel">Numéro de téléphone :</label>
            <input type="number" placeholder="Saisir votre numéro de téléphone" name="phone" required>
            
            <label for="mot de passe">Mot de passe :</label>
            <input type="password" placeholder="Saisir votre mot de passe" name="mdp" required>

            <label for="mot de passe"> Verification du mot de passe :</label>
            <input type="password" placeholder="Saisir votre mot de passe" name="mdp-verif" required>
            
            <label for="codePostal">Code postal :</label>
            <input type="number" onkeydown="return event.keyCode !== 69" placeholder="Saisir votre code postal" name="codepostal" required>
            
            <label for="ville">Ville :</label>
            <input type="text" placeholder="Saisir votre ville" name="ville" required>
            
            <label for="adresse">Adresse :</label>
            <input type="text" placeholder="Saisir votre adresse" name="adresse">
            
            <div>
            <button   class="button-inscription"type="submit" name="submit" > S'inscrire</button>
            </div>
            
            </form>
        </div>



    </form>

</body>

</html>
<?php

$mysqltme = date( 'Y-m-d H:i:s',time());
   
    
    if(isset($_POST["submit"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $age = $_POST["age"];
        $email = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $mdpcheck = $_POST["mdp-verif"];
        $codepostal = $_POST["codepostal"];
        $ville = $_POST["ville"];
        $adresse = $_POST["adresse"];
        $phone= $_POST["phone"];
        $sql = "SELECT * FROM Compte WHERE email = '$email' ";
        $result = $db -> prepare($sql);
        $result->execute();
        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
        $hashedPasswordcheck = password_hash($mdpcheck, PASSWORD_DEFAULT);
        if($result->rowCount()>0){
            echo "<script>alert('Ce compte existe déjà');</script>";
           
         }
        else{
            if($mdp!=$mdpcheck)
            {
                 echo "<script>alert('Les mots de passes ne sont pas identiques');</script>";
              
            }
            else{
                if(strlen($mdp) < 5){
                    echo "<script>alert('mot de passe trop court');</script>";
                }
                else{
                    if(preg_match("#^[0-9]{5}$#",$codepostal)){
                        if(strlen($ville<=1)){
                            echo "<script>alert('Nom de ville trop court');</script>";
                            }
                        else{
                            if(preg_match('`[0-9]{10}`',$phone))
                            {
                                $sqlreq="INSERT INTO Compte (nom,prenom,motDePasse,tel,email,dateCreation,age) VALUES ('$nom','$prenom','$hashedPassword','$phone','$email','$mysqltme',$age)";
                                $res = $db -> prepare($sqlreq);
                                $res->execute();
                                $lastID = $db->lastInsertId();
                                $sqlLoc="INSERT INTO Localisation (idCompte,ville, adresse,code_postal) VALUES ($lastID,'$ville','$adresse',$codepostal)";
                                $stmt = $db-> prepare($sqlLoc);
                                $stmt -> execute();
                                
                                header("Location: ./index.php");

                                die();
                            
                            }
                            
                            else {
                            
                                echo "<script>alert('Numéro de téléphone invalide');</script>";
                            }
                        }
                    }
                    else{
                        echo "<script>alert('Code postal invalide');</script>";
                    }
                }
        
            }    
    
        
        }
        
    }

?>