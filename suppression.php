<?php
    $pdo = require 'connect.php';

    $id = $_GET['id'];

    $sql = 'DELETE FROM villes
            WHERE ville_id = :ville_id';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':ville_id', $id, PDO::PARAM_INT);

    if($statement->execute()){
        $message = '<p class="message">
        La ville a bien été supprimée dans la base.<br>
        <a href="liste.php">Accéder à la liste des villes</a>
        </p>';
    }else{
    $message =
        '<p class="error">Erreur lors de la suppression.</p>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <?php echo $message; ?>
    </div>
</body>
</html>