<?php

class Voiture {
    private $id;
    private $marque;
    private $modele;
    private $immatriculation;
    private $type;
    private $etat;
    private $prix;
    private $location;

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


    public function getId() { return $this->id; }
    public function getMarque() { return $this->marque; }
    public function getModele() { return $this->modele; }
    public function getImmatriculation() { return $this->immatriculation; }
    public function getType() { return $this->type; }
    public function getEtat() { return $this->etat; }
    public function getPrix() { return $this->prix; }
    public function getLocation() { return $this->location; }


    public function setMarque($marque) { $this->marque = $marque; }
    public function setModele($modele) { $this->modele = $modele; }
    public function setImmatriculation($immatriculation) { $this->immatriculation = $immatriculation; }
    public function setType($type) { $this->type = $type; }
    public function setEtat($etat) { $this->etat = $etat; }
    public function setPrix($prix) { $this->prix = $prix; }
    public function setLocation($location) { $this->location = $location; }
}