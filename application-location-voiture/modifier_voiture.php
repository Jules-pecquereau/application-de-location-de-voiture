<?php
require_once('VoitureManager.php');


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID de voiture non spécifié.');
}

$id = $_GET['id'];

$voitureManager = new VoitureManager();
$voitures = $voitureManager->getAllVoitures();


$voitureToEdit = null;
foreach ($voitures as $voiture) {
    if ($voiture->getId() == $id) {
        $voitureToEdit = $voiture;
        break;
    }
}

if (!$voitureToEdit) {
    die('Voiture non trouvée.');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marque = htmlspecialchars($_POST['marque']);
    $modele = htmlspecialchars($_POST['modele']);
    $immatriculation = htmlspecialchars($_POST['immatriculation']);
    $type = htmlspecialchars($_POST['type']);
    $etat = htmlspecialchars($_POST['etat']);
    $prix = htmlspecialchars($_POST['prix']);
    $location = isset($_POST['location']) ? 1 : 0; 

    
    $voitureToEdit->setMarque($marque);
    $voitureToEdit->setModele($modele);
    $voitureToEdit->setImmatriculation($immatriculation);
    $voitureToEdit->setType($type);
    $voitureToEdit->setEtat($etat);
    $voitureToEdit->setPrix($prix);
    $voitureToEdit->setLocation($location);

    
    if ($voitureManager->updateVoiture($voitureToEdit)) {
        echo "Voiture mise à jour avec succès.";
        header('Location: voir_voiture.php'); 
        exit();
    } else {
        echo "Erreur lors de la mise à jour de la voiture.";
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

<form action="modifier_voiture.php?id=<?php echo $voitureToEdit->getId(); ?>" method="POST">
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
            <option value="0">bon</option>
            <option value="1">mauvais</option>
        </select><br>

    <label for="prix">Prix à la journée:</label>
    <input type="float" id="prix" name="prix" value="<?php echo $voitureToEdit->getPrix(); ?>" required><br>

    <label for="location">En location:</label>
    <select name="lacation">
            <option value="0">0</option>
            <option value="1">1</option>
        </select><br>

    <input type="submit" value="Mettre à jour">
</form>

</body>
</html>
