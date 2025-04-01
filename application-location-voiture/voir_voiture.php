<?php
require_once('VoitureManager.php');
session_start(); 

$voitureManager = new VoitureManager();


if (isset($_GET['type']) && $_GET['type'] === 'supprimer' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $voitureManager->deleteVoiture($id);
    header("Location: voir_voiture.php");
    exit;
}


$voitures = $voitureManager->getAllVoitures();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des voitures</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
        <h2>Ajouter une voiture</h2>
        <form action="ajouter_voiture.php" method="post">
            <label>Marque :</label>
            <input type="text" name="marque" required><br>
            
            <label>Modèle :</label>
            <input type="text" name="modele" required><br>
            
            <label>Immatriculation :</label>
            <input type="text" name="immatriculation" required><br>
            
            <label>Type :</label>
            <input type="text" name="type" required><br>
            
            <label>État du véhicule :</label>
            <select name="etat">
                <option value="0">Mauvais</option>
                <option value="1">Bon</option>
            </select><br>
            
            <label>Prix à la journée :</label>
            <input type="number" name="prix" step="0.01" required><br>
            
            <label>Déjà loué :</label>
            <select name="location">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select><br>
            
            <button type="submit">Ajouter</button>
        </form>
    <?php endif; ?>

    <h2>Liste des voitures</h2>
    <table>
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Immatriculation</th>
            <th>Type</th>
            <th>État du véhicule</th>
            <th>Prix à la journée</th>
            <th>Déjà loué ou non</th>

            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
        <?php
        foreach ($voitures as $voiture) {
            echo "<tr>
                <td>{$voiture->getMarque()}</td>
                <td>{$voiture->getModele()}</td>
                <td>{$voiture->getImmatriculation()}</td>
                <td>{$voiture->getType()}</td>
                <td>" . ($voiture->getEtat() ? "Bon état" : "Mauvais état") . "</td>
                <td>{$voiture->getPrix()}</td>
                <td>" . ($voiture->getLocation() ? "Oui" : "Non") . "</td>";
                
            
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                echo "<td>
                        <a href='voir_voiture.php?type=supprimer&id={$voiture->getId()}' onclick='return confirm(`Voulez-vous vraiment supprimer cette voiture ?`);'>Supprimer</a> |
                        <a href='modifier_voiture.php?id={$voiture->getId()}'>Modifier</a>
                      </td>";
            }

            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
