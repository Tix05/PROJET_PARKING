<?php
require_once('../model/connexion.php');

class Historique extends Connexion {
    private $id_historique;
    private $id_location;
    private $marque_vehicule;
    private $nom_proprietaire;
    private $date_debut;
    private $date_fin;


    public function getIdHistorique() {
        return $this->id_historique;
    }

    public function setIdHistorique($id_historique) {
        $this->id_historique = intval($id_historique);
    }


    public function getIdLocation() {
        return $this->id_location;
    }

    public function setIdLocation($id_location) {
        $this->id_location = intval($id_location);
    }

    
    public function getMarqueVehicule() {
        return $this->marque_vehicule;
    }

    public function setMarqueVehicule($marque_vehicule) {
        $this->marque_vehicule = $marque_vehicule;
    }
   
    public function getNomProprietaire() {
        return $this->nom_proprietaire;
    }

    public function setNomProprietaire($nom_proprietaire) {
        $this->nom_proprietaire = $nom_proprietaire;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    public function __construct() {
        $this->id_historique = 0;
        $this->id_location = 0;
        $this->marque_vehicule = "";
        $this->nom_proprietaire = "";
        $this->date_debut = "";
        $this->date_fin = "";
        parent::__construct(); 
    }

    public function create_history() {
        $stmt = $this->conn->prepare("INSERT INTO `historique`(`ID_HISTORY`, `ID_LOCATION`, `PROPRIETAIRE`, `MARQUE_VOITURE`, `date_debut`, `date_fin`)
         VALUES (null, :id_location, :nom_proprietaire, :marque_voiture, :date_debut, :date_fin)");

        $data = array(
            "id_location" => $this->id_location,
            "marque_voiture" => $this->marque_vehicule,
            "nom_proprietaire" => $this->nom_proprietaire,
            "date_debut" => $this->date_debut,
            "date_fin" => $this->date_fin,
        );
        $stmt->execute($data);
    }

    public function afficher_historique() {
        $stmt = $this->conn->prepare("SELECT * FROM `historique`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

   public function pourcentage_location() {
        $stmt = $this->conn->prepare("SELECT YEAR(date_debut) AS annee, COUNT(*) AS nombre_de_locations
        FROM historique
        GROUP BY YEAR(date_debut);");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result != null) {
            $result =  $result[0];
            $data = array(
                "annee" => $result['annee'],
                "pourcentage" =>number_format(($result['nombre_de_locations']/365)*100,2),
            );
            return $data; 
        }else{
            return array(
                "annee" => 2024,
                "pourcentage" => 0,
            );
        }
   }
}