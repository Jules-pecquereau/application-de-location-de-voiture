<?php
require('liaison.php');
class Voiture {
    public $id;
    public $marque;
    public $modele; 
    public $immatriculation;
    public $type;
    public $etat;
    public $prix;
    public $location;

    public function __construct($id, $marque, $modele, $immatriculation, $type, $etat, $prix, $location) {
        $this->id = $id;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->immatriculation = $immatriculation;
        $this->type = $type;
        $this->etat = $etat;
        $this->prix = $prix;
        $this->location = $location;
    }


    public static function getAllVoitures() {
        global $pdo; 
        $sql = "SELECT * FROM voitures";
        $bdd = $pdo->query($sql);
        $voitures = [];
        
        while ($row = $bdd->fetch(PDO::FETCH_ASSOC)) {
            $voitures[] = new Voiture(
                $row['id'],
                $row['marque'],
                $row['modèle'],  
                $row['immatriculation'],
                $row['type'],
                $row['état'],  
                $row['prix_journalier'],
                $row['en_location']
            );
        }
        
        return $voitures;
    } 
    public function afficherInfos() {
        
        echo "<tr><td>".$this->marque."</td>
        <td>".$this->modele."</td>
        <td>".$this->immatriculation."</td>
        <td>".$this->type."</td>
        <td>".$this->etat."</td>
        <td>".$this->prix."</td>
        <td>". ($this->location ? "Oui" : "Non") ."</td>
        <td><a href='voir_voiture.php?type=supprimer&id=".$this->id."'>supprimer</a></td>
        <td><a href='voir_voiture.php?id=".$this->id."'>modifier</a></td></tr>";
    }
}



?>