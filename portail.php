<?php
include 'values.php';
include 'settingsBDD.php';
if (($_SESSION['idCompte'] or $userinfo['email'] ))
{
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./_global.css">
    <link rel="stylesheet" href="./_portail.css">
    <title>Profile</title>
</head>

<body>

    <main>
        <form action="./access.php" method="POST">
            <h3>Afin d'acceder a vos données, veuillez saisir votre mot de passe</h3>
            <input type="password" name="mdp">
            <button type="submit">Se connecter</button>
        </form>


    </main>
</body>

</html>
<?php
}
else
{
    header('Location: connection.php');
}
?>