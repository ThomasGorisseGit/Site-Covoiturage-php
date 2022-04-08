<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bddtest";
    
        try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        echo "Err: " . $e->getMessage();
        }
?>
