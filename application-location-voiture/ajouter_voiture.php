<?php
require_once('VoitureManager.php');
$voitureManager = new VoitureManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (
        isset($_POST['marque'], $_POST['modele'], $_POST['immatriculation'], $_POST['type'], $_POST['etat'], $_POST['prix'], $_POST['location'])
        && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['immatriculation']) && !empty($_POST['type']) && !empty($_POST['etat']) && !empty($_POST['prix'])
    ) {
        
        $marque =$_POST['marque'];
        $modele = $_POST['modele'];
        $immatriculation = $_POST['immatriculation'];
        $type = $_POST['type'];
        $etat = $_POST['etat'];
        $prix = $_POST['prix'];
        $location = ($_POST['location'] === 'oui') ;

        
        $voiture = new Voiture(null, $marque, $modele, $immatriculation, $type, $etat, $prix, $location);
        $voitureManager->addVoiture($voiture);

        
        header("Location: voir_voiture.php");
        exit;
    }    
}
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
    <form action="voir_voiture.php" method="post">
        <label>Marque: <input type="text" name="marque" ></label><br>
        <label>Modèle: <input type="text" name="modele" ></label><br>
        <label>Immatriculation: <input type="text" name="immatriculation" ></label><br>
        <label>Type: <input type="" name="type" ></label><br>
        <select name="etat">
            <option value="0">0</option>
            <option value="1">1</option>
        </select><br>
        <label>Prix à la journée: <input type="number" step="0.01" name="prix" ></label><br>
        <label>Déjà loué:
            <select name="location">
                <option value="0">0</option>
                <option value="1">1</option>
            </select>
        </label><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
