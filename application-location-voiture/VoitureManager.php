<?php
require_once('Voiture.php');
require_once('liaison.php');

class VoitureManager {
    private $pdo;

    public function __construct() {
        $bdd = new Bdd();
        $this->pdo = $bdd->getPDO();
    }

    public function getAllVoitures() {
        $sql = "SELECT * FROM voitures";
        $stmt = $this->pdo->query($sql);
        $voitures = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $voitures[] = new Voiture(
                $row['id'],
                $row['marque'],
                $row['modele'],
                $row['immatriculation'],
                $row['type'],
                $row['etat'],
                $row['prix_journalier'],
                $row['en_location']
            );
        }
        return $voitures;
    }

    public function deleteVoiture($id) {
        $sql = "DELETE FROM voitures WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function updateVoiture(Voiture $voiture) {
        $sql = "UPDATE voitures SET marque = :marque, modele = :modele, immatriculation = :immatriculation, 
                type = :type, etat = :etat, prix_journalier = :prix, en_location = :location WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $voiture->getId(),
            'marque' => $voiture->getMarque(),
            'modele' => $voiture->getModele(),
            'immatriculation' => $voiture->getImmatriculation(),
            'type' => $voiture->getType(),
            'etat' => $voiture->getEtat(),
            'prix' => $voiture->getPrix(),
            'location' => $voiture->getLocation()
        ]);
    }

    public function addVoiture(Voiture $voiture) {
        $sql = "INSERT INTO voitures (marque, modele, immatriculation, type, etat, prix_journalier, en_location) 
                VALUES (:marque, :modele, :immatriculation, :type, :etat, :prix, :location)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'marque' => $voiture->getMarque(),
            'modele' => $voiture->getModele(),
            'immatriculation' => $voiture->getImmatriculation(),
            'type' => $voiture->getType(),
            'etat' => $voiture->getEtat(),
            'prix' => $voiture->getPrix(),
            'location' => $voiture->getLocation()
        ]);
    }
}
