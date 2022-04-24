<?php
session_start();
include 'settingsBDD.php';
$requser = $db->prepare('SELECT * FROM Compte WHERE idCompte = :idCompte');
$requser->execute(array('idCompte' => $_SESSION['idCompte']));
$userinfo = $requser->fetch();
$secreq = $db->prepare('SELECT * FROM Localisation WHERE idCompte=:idCompte');
$secreq->execute(array('idCompte' => $_SESSION['idCompte']));
$localinfo = $secreq->fetch();
?>