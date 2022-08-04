<?php
    $pdo = require 'connect.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1>Accueil</h1>
        <p>Bienvenue sur le mini-site consacré aux villes</p>
        <p>Ce site utilise PHP et MySQL</p>
        <p>Utilisez le menu de navigation pour consulter les pages du site.</p>
        <p>Bonne visite !</p>
    </div>
    <?php require 'menu.php'; ?>
    <?php require 'footer.php'; ?>