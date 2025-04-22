<?php
require_once('../class/VoitureManager.php');
require_once("../controlleur/traitement_voiture.php");

            $voitures = $voitureManager->getAllVoitures();
            $id = $_GET['id'];


            $voitureToEdit = null;
            foreach ($voitures as $voiture) {
                if ($voiture->getId() == $id) {
                    $voitureToEdit = $voiture;
                    break;
                }
            }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier Voiture</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Modifier la voiture</h1>

<form action="../controlleur/traitement_voiture.php?id=<?php echo $voitureToEdit->getId(); ?>&type=modifier" method="POST" >
    <label for="marque">Marque:</label>
    <input type="text" id="marque" name="marque" value="<?php echo $voitureToEdit->getMarque(); ?>" required><br>

    <label for="modele">Modèle:</label>
    <input type="text" id="modele" name="modele" value="<?php echo $voitureToEdit->getModele(); ?>" required><br>

    <label for="immatriculation">Immatriculation:</label>
    <input type="text" id="immatriculation" name="immatriculation" value="<?php echo $voitureToEdit->getImmatriculation(); ?>" required><br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" value="<?php echo $voitureToEdit->getType(); ?>" required><br>

    <label for="etat">État:</label>
    <select name="etat">
            <option value="0">mauvais</option>
            <option value="1">bon</option>
        </select><br>

    <label for="prix">Prix à la journée:</label>
    <input type="float" id="prix" name="prix" value="<?php echo $voitureToEdit->getPrix(); ?>" required><br>

    <label for="location">En location:</label>
    <select name="location">
            <option value=0>pas dispo</option>
            <option value=1>disponible</option>
        </select><br>

    <input type="submit" value="Mettre à jour">
</form>

</body>
</html>
