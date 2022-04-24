
<?php
include 'settingsBDD.php';
include 'values.php';
if(isset($_POST['nom']) AND !empty($_POST['nom']) and $_POST['nom']!=$userinfo['nom']){
    $nouveaunom=htmlspecialchars($_POST['nom']);
    $insertnom = $db->prepare("UPDATE Compte SET nom = ? WHERE idCompte = ?");
    $insertnom->execute(array(
        $nouveaunom,
        $_SESSION["idCompte"]

    ));
    header('Location: profile.php');
}

if(isset($_POST['mail']) AND !empty($_POST['mail']) and $_POST['mail']!=$userinfo['email']){
    $nouveaumail=htmlspecialchars($_POST['mail']);
    $insertmail = $db->prepare("UPDATE Compte SET email = ? WHERE idCompte = ?");
    $insertmail->execute(array(
        $nouveaumail,
        $_SESSION["idCompte"]
    ));
    header('Location: profile.php');
}

if(isset($_POST['prenom']) AND !empty($_POST['prenom']) and $_POST['prenom']!=$userinfo['prenom']){
    $nouveauprenom=htmlspecialchars($_POST['prenom']);
    $insertprenom = $db->prepare("UPDATE Compte SET prenom = ? WHERE idCompte = ?");
    $insertprenom->execute(array(
        $nouveauprenom,
        $_SESSION["idCompte"]
    ));
    header('Location: profile.php');
}
if(isset($_POST['age']) AND !empty($_POST['age']) and $_POST['age']!=$userinfo['age']){
    $nouveauage=htmlspecialchars($_POST['age']);
    $insertage= $db->prepare("UPDATE Compte SET age = ? WHERE idCompte = ?");
    $insertage->execute(array(
        $nouveauage,
        $_SESSION["idCompte"]
    ));
    header('Location: profile.php');
}
if(isset($_POST['phone']) AND !empty($_POST['phone']) and $_POST['phone']!=$userinfo['tel']){
    $nouveatel=htmlspecialchars($_POST['phone']);
    $inserttel = $db->prepare("UPDATE Compte SET tel = ? WHERE idCompte = ?");
    $inserttel->execute(array(
        $nouveatel,
        $_SESSION["idCompte"]
    ));
    header('Location: profile.php');
}
if(isset($_POST['ville']) AND !empty($_POST['ville']) and $_POST['ville']!=$localinfo['ville']){
    $nouveaville=htmlspecialchars($_POST['ville']);
    $insertville = $db->prepare("UPDATE Localisation SET ville = ? WHERE idCompte = ?");
    $insertville->execute(array(
        $nouveaville,
        $_SESSION["idCompte"]
    ));
    header('Location: profile.php');
}
if(isset($_POST['adresse']) AND !empty($_POST['adresse']) and $_POST['adresse']!=$localinfo['adresse']){
    $nouveaadr=htmlspecialchars($_POST['adresse']);
    unset($_SESSION['latitude']);
    $insertadr = $db->prepare("UPDATE Localisation SET adresse = ? , latitude=null, longitude=null WHERE idCompte = ?");
    $insertadr->execute(array(
        $nouveaadr,
        $_SESSION["idCompte"]
    ));
    
    header('Location: profile.php');
}
if(isset($_POST['codepostal']) AND !empty($_POST['codepostal']) and $_POST['codepostal']!=$localinfo['code_postal']){
    $nouveacp=htmlspecialchars($_POST['codepostal']);
    $insertcp = $db->prepare("UPDATE Localisation SET code_postal = ? WHERE idCompte = ?");
    $insertcp->execute(array(
        $nouveacp,
        $_SESSION["idCompte"]
    ));
    header('Location: profile.php');
}

if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {

    $taillemax = 2097152;
    $extensionValide = array('jpg', 'jpeg', 'png');
    if ($_FILES['avatar']['size'] <= $taillemax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValide)) {
            $path = "./avatars/" . $_SESSION['idCompte'] . "." . $extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
            if ($resultat) {

                $myavatar = $_SESSION['idCompte'] . '.' . $extensionUpload;
                $updateAvatar = $db->prepare('UPDATE Compte SET avatar = :avatar WHERE idCompte = :idCompte');
                $updateAvatar->execute(array(
                    'avatar' => $_SESSION['idCompte'] . '.' . $extensionUpload,
                    'idCompte' => $_SESSION['idCompte']
                ));
                header("Location: ./editprofile.php");
            } else {
                echo "<script>alert('Votre photo n'a pas pu être importée');</script>";
            }
        } else {
            echo "<script>alert('format invalide');</script>";
        }
    } else {
        echo "<script>alert('Votre image est trop lourde');</script>";
    }
}
if(isset($_POST['password']) AND !empty($_POST['password']) and isset($_POST['checkpassword']) AND !empty($_POST['checkpassword'])){
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    
    $insertmdp = $db->prepare("UPDATE Compte SET motDePasse = ? WHERE idCompte = ?");
    $insertmdp->execute(array(
        $password,
        $_SESSION["idCompte"]
    ));
    header('Location: profile.php');
}
?>
<a href="./profile.php">Retourner vers le profil</a>