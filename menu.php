<?php


$sql = 'SELECT ville_id, ville_nom FROM villes';

$statement = $pdo->query($sql);

//Récupérer toutes les villes
$villes = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<?php if ($villes) : ?>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php foreach ($villes as $ville) : ?>
        <li><a href="ville.php?id=<?php echo $ville->ville_id; ?>"><?php echo $ville->ville_nom; ?></a></li>
        <?php endforeach ?>
        <br>
        <li><a href="admin.php">Administration</a></li>
    </ul>
<?php endif ?>