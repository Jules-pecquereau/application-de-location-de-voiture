<?php
require_once('../class/VoitureManager.php');
require_once('../class/Voiture.php');

$voitureManager = new VoitureManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['marque'], $_POST['modele'], $_POST['immatriculation'], $_POST['type'], $_POST['etat'], $_POST['prix'], $_POST['location'], $_POST['dateRendu'], $_POST['datePrise'])
        && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['immatriculation']) && !empty($_POST['type']) && !empty($_POST['prix'] && !empty($_POST['dateRendu'] && !empty($_POST['datePrise'])))
    ) {
        
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $immatriculation = $_POST['immatriculation'];
        $type = $_POST['type'];
        $etat = $_POST['etat'] ;
        $prix = $_POST['prix'];
        $location = $_POST['location'];
        $datePrise= $_POST['datePrise'];
        $dateRendu=$_POST['dateRendu'];

        
        $voiture = new Voiture(null, $marque, $modele, $immatriculation, $type, $etat, $prix, $location, $datePrise, $dateRendu);

        
        if ($voitureManager->addVoiture($voiture)) {
            header("Location: ../index.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    }
}
if(isset($_GET['type'])){

        if($_GET['type']=="modifier"){

            $id = $_GET['id'];
            $voitures = $voitureManager->getAllVoitures();
            $voitureToEdit = null;
            foreach ($voitures as $voiture) {
                if ($voiture->getId() == $id) {
                    $voitureToEdit = $voiture;
                    break;
                }
            }

            




            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $marque = $_POST['marque'];
                $modele = $_POST['modele'];
                $immatriculation = $_POST['immatriculation'];
                $type = $_POST['type'];
                $etat = $_POST['etat'];
                $prix = $_POST['prix'];
                $location = $_POST['location']; 

                
                $voitureToEdit->setMarque($marque);
                $voitureToEdit->setModele($modele);
                $voitureToEdit->setImmatriculation($immatriculation);
                $voitureToEdit->setType($type);
                $voitureToEdit->setEtat($etat);
                $voitureToEdit->setPrix($prix);
                $voitureToEdit->setLocation($location);
                
                if ($voitureManager->updateVoiture($voitureToEdit)) {

                    header('Location: index.php'); 
                    exit();
                } 
            }
        }
    }
    
?>
