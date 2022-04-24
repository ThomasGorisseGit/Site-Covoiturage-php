<?php
session_start();
include "settingsBDD.php";
// include "updatepos.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD39_LfkB6MnorIT-zfvqtGK4RJWiTQew"></script>
    <script src="test.js" defer></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

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
            <form method="POST" action="test.js:exec()">
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
            <input type="text" id="adress" placeholder="Saisir votre adresse" name="adresse">
            
            <div>
            <button onsubmit="exec()" onclick="exec()" class="button-inscription"type="submit" name="submit" > S'inscrire</button>
            </div>
            
            </form>
        </div>

        

    </form>
</body>

</html>
<?php




$mysqltme = date( 'Y-m-d H:i:s',time());

// if(isset($_POST['latlng'])){
//     echo('a');
//     $latitude = substr($_POST['latlng'],1,strpos($_POST['latlng'],',')-1);
//     $longitude = substr($_POST['latlng'], strpos($_POST['latlng'],',')+1, strlen($_POST['latlng'])-12 );
//     $req = $db->prepare("INSERT INTO positions(latitude,longitude) VALUES ($latitude, $longitude)");
//     $req->execute();
// }
    if(isset($_POST["submit"])){
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $age = htmlspecialchars($_POST["age"]);
        $email = htmlspecialchars($_POST["mail"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $mdpcheck = htmlspecialchars($_POST["mdp-verif"]);
        $codepostal = htmlspecialchars($_POST["codepostal"]);
        $ville = htmlspecialchars($_POST["ville"]);
        $adresse = htmlspecialchars($_POST["adresse"]);
        $phone= htmlspecialchars($_POST["phone"]);
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
                                $_SESSION["mail"] = $email;
                                $_SESSION["login"] = $hashedPassword;
                                $_SESSION['idCompte'] = $lastID;
                                $sqlLoc="INSERT INTO Localisation (idCompte,ville, adresse,code_postal) VALUES ($lastID,'$ville','$adresse',$codepostal)";
                                $stmt = $db-> prepare($sqlLoc);
                                $stmt -> execute();
                                
                                 header("Location: ./updatepos.php");
                                
                              
                                
                                
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


