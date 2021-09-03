<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP / MySQL</title>
    <meta charset='utf-8'>
</head>

<body>
    <h1>Bases de données MySQL</h1>
    <?php
    try {
        $idVoitures = $_GET['id'];
        $pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM voitures WHERE idVoitures = $idVoitures";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $count = $sth->rowCount();
        print('Effacement de ' . $count . ' entrées.');
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
</body>
<?php
    header("location:index.php");
    ?>
</html>