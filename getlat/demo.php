<?php
include '../settingsBDD.php';
$stmt= "SELECT latitude FROM Localisation";
$req = $db->prepare($stmt);
$req -> execute();
$data = $req->fetch(PDO::FETCH_ASSOC);
print $data['latitude'];

?>