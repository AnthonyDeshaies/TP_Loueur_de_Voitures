<?php
$pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM voitures");
$req1->execute();
$categories = $req1->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voiture</title>
</head>

<body>
    <form action="createVoiture.php" method="post" enctype="multipart/form-data">
        <p>Immatriculation : <input type="text" name="immatriculation"></p>
        <p>Marque : <input type="text" name="marque"></p>
        <p>Modèle : <input type="text" name="modele"></p>
        <p>Année : <input type="text" name="annee"></p>
        <p>Photo : <input type="file" value="form-control-file" name ="img"></p>
        <input type="submit" value="Ajouter cette voiture">
    </form>
    
    <ul>
        <?php
            foreach ($categories as $key => $value) 
            {
             echo "<li>$value[immatriculation]</li>";
             echo "<li>$value[marque]</li>";
             echo "<li>$value[modele]</li>";
             echo "<li>$value[annee]</li>";
             echo "<li>$value[img]</li>";
            }
        ?>
    </ul>

</body>




</html