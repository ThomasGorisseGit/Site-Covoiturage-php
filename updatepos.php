<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD39_LfkB6MnorIT-zfvqtGK4RJWiTQew"></script>
    <script src="./test.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
    
</body>

</html>
<?php

include './settingsBDD.php';
include 'values.php';
$query = " ' ". $localinfo['adresse'] . "'";

echo " <script>exec(" . $query . " )</script>;";

;
    if(isset($_POST['latlng'])){
        print($_POST['latlng']);
        $latitude = substr($_POST['latlng'],1,strpos($_POST['latlng'],',')-1);
        $longitude = substr($_POST['latlng'], strpos($_POST['latlng'],',')+1, (strpos($_POST['latlng'],')')-12));
        print strpos($_POST['latlng'],')');
        print($longitude);
        $id = $localinfo['idLocalisation'];
        $stmt= "UPDATE Localisation SET latitude = $latitude , longitude = $longitude WHERE (idLocalisation = $id) ";
        $req = $db->prepare($stmt);
        $req->execute();
    
        $_SESSION['latitude'] = $latitude;
        
    }
    if(isset($_SESSION['latitude'])){
        print 'Vous avez été inscrit';
        header('Location: index.php');
    }
    else {
        print 'Veuillez patienter 3 secondes.';
        header('refresh:1');
        
    }
    // 43.610395, 6.969002199999999 
?>