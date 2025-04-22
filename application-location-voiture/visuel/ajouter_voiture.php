<?php
require_once('../class/VoitureManager.php');
$voitureManager = new VoitureManager();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter une voiture</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Ajouter une voiture</h2>
    <form action="../controlleur/traitement_voiture.php" method="post">

        <label>Marque: <input type="text" name="marque" ></label><br>
        <label>Modèle: <input type="text" name="modele" ></label><br>
        <label>Immatriculation: <input type="text" name="immatriculation" ></label><br>
        <label>Type: <input type="" name="type" ></label><br>
        <select name="etat">
            <option value=0>mauvais</option>
            <option value=1>bon</option>
        </select><br>
        <label>Prix à la journée: <input type="number" step="0.01" name="prix" ></label><br>
        <label>Déjà loué:
            <select name="location">
                <option value=0>pas dispo</option>
                <option value=1>dispo</option>
            </select><br>
            <label>Date emprim:<input type="date" name="datePrise" > </label><br>
            <label>Date remise:<input type="date" name="dateRendu" > </label><br>
        </label><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
