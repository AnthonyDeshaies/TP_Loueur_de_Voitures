<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `location` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=location;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table voitures
    $req1 = "CREATE TABLE IF NOT EXISTS `location`.`voitures`(
    idVoitures INT NOT NULL AUTO_INCREMENT ,
    immatriculation VARCHAR(50) NOT NULL ,
    marque VARCHAR(255) ,
    modele VARCHAR(255) ,
    img VARCHAR(255) ,
    annee INT(4) ,
    PRIMARY KEY(idVoitures));";
    $pdo->exec($req1);

    //Création de la table users
    $req2 = "CREATE TABLE IF NOT EXISTS `location`.`users` (
    idUser INT NOT NULL AUTO_INCREMENT ,
    nom VARCHAR(255) ,
    prenom VARCHAR(255) ,
    idVoitures INT(5) ,
    DateLocacation TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`idUser`));";
    $pdo->exec($req2);
    echo 'Félicitations, les tables ont bien été créées !';
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
