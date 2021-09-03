<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=location;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM users INNER JOIN voitures ON users.idVoitures = voitures.idVoitures");
$req1->execute();
$users = $req1->fetchAll(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM voitures");
$req2->execute();
$voitures = $req2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire clients</title>
</head>

<header>
    <?php
    include 'header.php';
    ?>
</header>

<body>
    <form action="createClient.php" method="POST">
        <p>Votre nom : <input type="text" name="nom"></p>
        <p>Votre prénom : <input type="text" name="prenom"></p>
        <select name="idVoitures">
            <option value="">--Choisissez votre voiture--</option>
            <?php foreach ($voitures as $key => $value2) { ?>
                <option value="<?php echo $value2['idVoitures'] ?>"><?php echo $value2['modele'] ?> </option>
            <?php    # code...
            }
            ?>
        </select>
        <input type="submit" value="Enregistrez vos coordonnées" class="enregistrer">
    </form>

    <table>

        <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Voiture</th>
            <th>Photo</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>


        <?php
        foreach ($users as $key => $value) {
        ?>

            <tr>
                <td><?php echo $value['nom'] ?></td>
                <td><?php echo $value['prenom'] ?></td>
                <td><?php echo $value['modele'] ?></td>
                <td>
                    <div class="image"><img src="<?php echo $value['img'] ?>" alt=""></div>
                </td>
                <td><a href="updateClient.php?id=<?php echo $value["idVoitures"] ?>" class="update">Modifier</a></td>
                <td><a href="deleteClient.php?id=<?php echo $value["idVoitures"] ?>" class="suppr">X</a></td>
            </tr>

        <?php
        }
        ?>
        </tbody>
    </table>
</body>

</html>