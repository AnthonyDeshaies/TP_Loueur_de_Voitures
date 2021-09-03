<?php
try{
$pdo = new PDO(
    'mysql:host=localhost;dbname=location;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

if ($_POST) {
    $nomUser = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $idVoitures = $_POST['idVoitures'];
        $req1 = $pdo->prepare("
INSERT INTO users(nom , prenom, idVoitures )
VALUES (:nom , :prenom, :idVoitures)");
        $req1->execute(array(
            ':nom' => $nomUser,
            ':prenom' => $prenom,
            ':idVoitures' => $idVoitures
        ));
        }
}
catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

        header('location:client.php');
    ?>
