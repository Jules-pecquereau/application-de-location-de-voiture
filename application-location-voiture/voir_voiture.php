<?php
session_start()
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Titre de la page</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        

<table>
        <tr>
            <th>marque</th>
            <th>modèle</th>
            <th>immatriculation</th>
            <th>type</th>
            <th>état du véhicule</th>
            <th>prix a la journée</th>
            <th>déjà louer ou non</th>
        </tr>
        <?php
require "liaison.php"; 


$voitures = Voiture::getAllVoitures();

foreach ($voitures as $voiture) {
    $voiture->afficherInfos();
}
?>

<table>
    </body>
    </html>