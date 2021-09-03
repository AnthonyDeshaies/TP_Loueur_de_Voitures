<?php
$immatriculation = $_POST['immatriculation'];
$idVoitures = $_POST['idVoitures'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$annee = $_POST['annee'];

$pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$req2 = $pdo -> prepare("UPDATE voitures
                            SET immatriculation = :immatriculation, marque = :marque, modele = :modele, annee = :annee
                             WHERE idVoitures = :idVoitures");






$req2->execute(array(
    ':idVoitures' => $idVoitures,
    ':immatriculation' => $immatriculation,
    ':marque' => $marque,
    ':modele' => $modele,
    ':annee' => $annee
));

header("location:index.php");

