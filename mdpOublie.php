<?php
include 'settingsBDD.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mot de passe oublié</title>
    <link rel="stylesheet" href="./_mdpforget.css">
</head>
<body>
    <form method="POST">
    <input type="email" placeholder="Enter your email" name = 'email' required>
    <button type="submit" name="submit">Submit here</button>
    </form>
</body>
</html>




<?php
    if(isset($_POST['email'])){
        $password = uniqid();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $message ="Voici votre nouveau mot de passe :";
        // $headers ='Content-Type: text/plain; charset="utf-8"'." ";
        if(mail($_POST['email'], 'Mot de passe oublie',$message))
         {
             $sql ="UPDATE compte SET password = ? WHERE email = ?";
             $stmt = $db->prepare($sql);
             $stmt->execute([$hashedPassword, $_POST['email']]);
             echo 'email envoyé';
         }
         else{
             echo 'une erreur est survenue';
         }

    }
?>