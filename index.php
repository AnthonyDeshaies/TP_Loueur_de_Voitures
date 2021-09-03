<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=location;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM voitures");
$req1->execute();
$voitures = $req1->fetchAll(PDO::FETCH_ASSOC);
?>


    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Les voitures de location</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel="stylesheet" href="style.css">
    </head>

    <header>
        <h1>"LES LOCATIONS DE THOUARÉ"</h1>
        <h2>Venez découvrir notre large gamme de véhicules !</h2>
    </header>

    <body>
        <div class="voitureForm">
            <h3>Ajouter une nouvelle voiture</h3>
            <form action="createVoiture.php" method="post" enctype="multipart/form-data">
                <p>Immatriculation<input type="text" name="immatriculation"></p>
                <p>Marque<input type="text" name="marque"></p>
                <p>Modèle<input type="text" name="modele"></p>
                <p>Année<input type="text" name="annee"></p>
                <p><span>Photo</span><input type="file" value="form-control-file" name="img" class="choose_img"></p>
                <input type="submit" value="Ajouter cette voiture" class="envoyer">
                
           
            </form>
        </div>
        <section class="listvoit">
            <table>
                <thead>
                    <th>Immatriculation</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Année</th>
                    <th>Photo</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>


                </thead>
                    <?php
                    foreach ($voitures as $key => $value) {
                    ?>

                        <tr>
                            <td><?php echo $value['immatriculation'] ?></td>
                            <td><?php echo $value['marque'] ?></td>
                            <td><?php echo $value['modele'] ?></td>
                            <td><?php echo $value['annee'] ?></td>
                            <td>
                                <div class="image"><img src="<?php echo $value['img'] ?>" alt=""></div>
                            </td>
                            <td><a href="updateVoiture.php?id=<?php echo $value["idVoitures"] ?>">Modifier</a></td>
                            <td><a href="deleteVoiture.php?id=<?php echo $value["idVoitures"] ?>" class="suppr">X</a></td>
                        </tr>

                    <?php
                    }
                    ?>
            </table>
        </section>
    </body>
</html>