<?php
$idVoitures =$_GET['id'];
$pdo = new PDO(
    'mysql:host=localhost;dbname=location;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM voitures WHERE idVoitures =$idVoitures");
$req1->execute();
$voitures = $req1->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="updateFormVoiture.php" method="post" enctype="multipart/form-data">
        <p>Immatriculation : <input type="text" name="immatriculation" value='<?php echo $voitures['immatriculation'] ?>'></p> 
        <p>Marque : <input type="text" name="marque" value='<?php echo $voitures['marque'] ?>'></p>
        <p>Modèle : <input type="text" name="modele" value='<?php echo $voitures['modele'] ?>'></p>
        <p>Année : <input type="text" name="annee" value='<?php echo $voitures['annee'] ?>'></p>
        <input type="hidden" value = "<?php echo $_GET["id"] ?>" name ="idVoitures">;
        <input type="submit" value="Ajouter cette voiture">
    </form>
</body>

</html>