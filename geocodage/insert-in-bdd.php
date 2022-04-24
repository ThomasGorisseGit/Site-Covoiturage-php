<?php
include '../settingsBDD.php';
 header('Content-type: text/html; charset=ISO-8859-1');
 if(isset($_POST['lat']) && isset($_POST['lng'])){
    echo'oui';
  $lat = addslashes($_POST['lat']);
  $lng = addslashes($_POST['lng']);
  $req = $db->prepare('INSERT INTO test (email) VALUES ('."$lat");
  echo 'Vos coordonnées ont bien été insérées en base de données.';
 }else
   echo 'Problème rencontré dans les valeurs passées en paramètres';
?>