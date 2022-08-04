<?php
$pdo = require 'connect.php';


//Récupération des variables
if (isset($_POST['submit_form'])) {
    $ville_nom = $_POST['ville_nom'];
    $ville_texte = $_POST['ville_texte'];
    $ville_id = $_POST['ville_id'];
    //Vérification du contenu des variables
    if (empty($ville_nom) or empty($ville_texte)) {
        $message =
            '<p class="error">Vous devez saisir le nom d\'une ville et sa présentation</p>';
    } else {
        //requête UPDATE
        $sql = 'UPDATE villes
                SET ville_nom = :ville_nom, ville_texte = :ville_texte
                WHERE ville_id = :ville_id';
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':ville_nom' => $ville_nom,
            ':ville_texte' => $ville_texte,
            'ville_id' => $ville_id
        ]);

        $count = $statement->fetch();
        if ($count > 0) {
            $message = '<p class="message">La mise à jour de la ville  ' . $ville_nom . ' est effectué</p>';
        } else {
            
            $message = '<p class="error">La mise à jour de la ville  ' . $ville_nom . ' n\'est pas effectué</p>';
        }
    }
}

$id = $_GET['id'];

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
                <input type="hidden" name="ville_id" value="<?php echo $id; ?>">
                <input type="submit" name="submit_form" value="Valider">
            </div>
        </form>
    </div>
</body>

</html>