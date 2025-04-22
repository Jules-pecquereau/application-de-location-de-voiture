<?php
require_once('class/VoitureManager.php');
session_start(); 

$voitureManager = new VoitureManager();


if (isset($_GET['type']) && $_GET['type'] === 'supprimer' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $voitureManager->deleteVoiture($id);
    header("Location: index.php");
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
        <a href="visuel/ajouter_voiture.php">ajouter une voiture</a>
    <?php endif; ?>
    <?php if (isset($_GET['type']) && $_GET['type'] === 'recheche' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $voitureManager->FindVoiture();
    header("Location: index.php");
    exit;
}
?>
        <form action="index.php" method="GET" >
            <br>
            <br><input type="text" placeholder="recherché" name="cherche" required>
            <input type="submit" value="recherche" name="recherche">
        </form>
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
            <th>date prise</th>
            <th>date rendu</th>

            <?php 
            if (!isset($_GET['recherche'])){
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
                <?php
                foreach ($voitures as $voiture) {
                    echo "<tr>
                        <td>".$voiture->getMarque()."</td>
                        <td>".$voiture->getModele()."</td>
                        <td>".$voiture->getImmatriculation()."</td>
                        <td>".$voiture->getType()."</td>
                        <td>" ;
                    if($voiture->getEtat()=="0"){echo "mauvaise état";} 
                    else {echo "bonne état";}
                    echo "</td>
                        <td>".$voiture->getPrix()."</td>
                        <td>" ;
                        if($voiture->getLocation()=="0"){echo "pas disponible";} 
                        else{echo "disponible";}
                        echo "</td>";
                        echo "<td>".$voiture->getDatePrise()."</td>";
                        echo "<td>".$voiture->getDateRendu()."</td>";
                    
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        echo "<td>
                                <a href='index.php?type=supprimer&id=".$voiture->getId()."' '>Supprimer</a> |
                                <a href='visuel/modifier_voiture.php?id=".$voiture->getId()."'>Modifier</a>
                            </td>";
                    }

                    echo "</tr>";
                }
            }
            else{
                $voitures = $voitureManager->FindVoitures();
                
                foreach ($voitures as $voiture) {
                echo "<tr>
                        <td>".$voiture->getMarque()."</td>
                        <td>".$voiture->getModele()."</td>
                        <td>".$voiture->getImmatriculation()."</td>
                        <td>".$voiture->getType()."</td>
                        <td>" ;
                    if($voiture->getEtat()=="0"){echo "mauvaise état";} 
                    else {echo "bonne état";}
                    echo "</td>
                        <td>".$voiture->getPrix()."</td>
                        <td>" ;
                        if($voiture->getLocation()=="0"){echo "pas disponible";} 
                        else{echo "disponible";}
                        echo"</td>";
                        echo "<td>".$voiture->getDatePrise()."</td>";
                        echo "<td>".$voiture->getDateRendu()."</td>";
                    
                    
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        echo "<td>
                                <a href='index.php?type=supprimer&id=".$voiture->getId()."' '>Supprimer</a> |
                                <a href='visuel/modifier_voiture.php?id=".$voiture->getId()."'>Modifier</a>
                            </td>";
                        }
                    
            }
        }
        ?>
    </table>
    <?php 
    if( isset($_SESSION['connection']) && $_SESSION['connection']== 1 ){
        echo"    <form action='connection/deconnection.php' method='POST'>
                <input type='submit' value='se déconnecter' >
                </form>";
            }
        else echo" <form action='connection/autentification.php' method='POST'>
                <input type='submit' value='se connecter' >
                </form>"; 
    ?>

</body>
</html>
