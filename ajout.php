<?php
$pdo = require 'connect.php';

//Récupération des variables
if (isset($_POST['submit_form'])) {
    $ville_nom = $_POST['ville_nom'];
    $ville_texte = $_POST['ville_texte'];
    //Vérification du contenu des variables
    if(empty($ville_nom) OR empty($ville_texte)){
        $message =
        '<p class="error">Vous devez saisir le nom d\'une ville et sa présentation</p>';
    }else{
        //La ville existe-t-elle dans la base ?
        $sql = 'SELECT count(ville_id)
                FROM villes
                WHERE ville_nom = :ville_nom';
        $statement = $pdo->prepare($sql);
        $statement->execute([':ville_nom' => $ville_nom]);

        $count = $statement->fetch();
        if($count > 0) {
            $message =
            '<p class="error">La ville est déjà enregistrée.</p>';
        }else{
            $sql = 'INSERT INTO villes (ville_nom, ville_texte)
                VALUES (:ville_nom, :ville_texte)';
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':ville_nom' => $ville_nom,
                ':ville_texte' => $ville_texte
            ]);

            $ville_id = $pdo->lastInsertId();

            if ($ville_id) {
                $message = '<p class="message">L\'ajout de la ville ' . $ville_nom . ' est effectué</p>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une ville</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1>Ajouter une ville</h1>
        <?php if (isset($message)) echo $message; ?>
        <form action="" method="POST">
            <div>
                <label for="nom">Nom de la ville :</label>
                <input type="text" name="ville_nom" id="nom">
            </div>
            <div>
                <p>Texte de présentation :</p>
                <textarea name="ville_texte" id="texte" cols="32" rows="8"></textarea>
            </div>
            <div>
                <input type="submit" name="submit_form" value="Valider">
            </div>
        </form>
    </div>
</body>

</html>