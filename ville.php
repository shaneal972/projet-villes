<?php
//Récupération de la variable externe
$id = $_GET['id'];

$pdo = require 'connect.php';

$sql = 'SELECT ville_id, ville_nom, ville_texte
            FROM villes
            WHERE ville_id = :id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
$ville = $statement->fetch(PDO::FETCH_OBJ);

if ($ville) {
    $nom = $ville->ville_nom;
    $texte = $ville->ville_texte;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nom; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1><?php echo $nom; ?></h1>
        <p><?php echo $texte; ?></p>
    </div>
    <?php require 'menu.php'; ?>
    <?php require 'footer.php'; ?>