<?php
$pdo = require 'connect.php';

$sql = 'SELECT ville_id, ville_nom FROM villes';

$statement = $pdo->query($sql);

//Récupérer toutes les villes
$villes = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1>Administration du mini-site des villes</h1>
        <p>
            L'administration du site vous permet d'ajouter une nouvelle ville au site 
            ou de modifier ou supprimer une ville existante.
        </p>
    </div>
    <div>
        <?php if ($villes) : ?>
            <p>Liste des villes :</p>
            <ul>
                <!-- <li><a href="index.php">Accueil</a></li> -->
                <?php foreach ($villes as $ville) : ?>
                    <li>
                        <a href="ville.php?id=<?php echo $ville->ville_id; ?>"><?php echo $ville->ville_nom; ?></a>
                        - <a href="edition.php?id=<?php echo $ville->ville_id; ?>">[editer]</a>
                        - <a href="suppression.php?id=<?php echo $ville->ville_id; ?>">[supprimer]</a>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </div>
    <div>
        <ul>
            <li><a href="admin-accueil.php">Accueil administration</a></li>
            <li><a href="ajout.php">Ajouter une ville</a></li>
            <br>
            <li><a href="index.php">Voir le liste</a></li>
        </ul>
    </div>
</body>

</html>