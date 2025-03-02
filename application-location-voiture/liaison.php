<?php
$host ='127.0.0.1';
$db ='application-location-voiture';
$user ='root';
$pass ='Royolouju-4';
$port ='3306';
$charset ='utf8mb4';
$options = [
    PDO::ATTR_ERRMODE   =>\PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES=>false,
];

$dsn ="mysql:host=$host;dbname=$db;charset=$charset;port=$port";

try{
    $pdo = new PDO($dsn,$user,$pass,$options);
}
catch(PDOException $e){
    echo $e->getMessage();
}

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

    public function afficherInfos() {
        echo "  | Marque: $this->marque | Modèle: $this->modele | Immatriculation: $this->immatriculation | Type: $this->type | État: $this->etat | Prix: $this->prix € | En location: " . ($this->location ? "Oui" : "Non") . "<br>";
    }

    public static function getAllVoitures() {
        global $pdo; 
        $sql = "SELECT * FROM voitures";
        $stmt = $pdo->query($sql);
        $voitures = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
}



?>