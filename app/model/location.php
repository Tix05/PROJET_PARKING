<?php
require_once('../model/connexion.php');

class Location extends Connexion {
    private $id_location;
    private $id_place;
    private $marque_vehicule;
    private $matriculation_vehicule;
    private $nom_proprietaire;
    private $contact_proprietaire;
    private $type_vehicule;
    private $date_debut;
    private $date_fin;
    private $cout_location;


    public function getIdLocation() {
        return $this->id_location;
    }

    public function setIdLocation($id_location) {
        $this->id_location = intval($id_location);
    }

    public function getIdPlace() {
        return $this->id_place;
    }

    public function setIdPlace($id_place) {
        $this->id_place = intval($id_place);
    }
    public function getMarqueVehicule() {
        return $this->marque_vehicule;
    }

    public function setMarqueVehicule($marque_vehicule) {
        $this->marque_vehicule = $marque_vehicule;
    }
    public function getMatriculationVehicule() {
        return $this->matriculation_vehicule;
    }

    public function setIMatriculationVoiture($matriculation_vehicule) {
        $this->matriculation_vehicule = $matriculation_vehicule;
    }
    public function getNomProprietaire() {
        return $this->nom_proprietaire;
    }

    public function setNomProprietaire($nom_proprietaire) {
        $this->nom_proprietaire = $nom_proprietaire;
    }
    public function getContactProprietaire() {
        return $this->contact_proprietaire;
    }

    public function setContactProprietaire($contact_proprietaire) {
        $this->contact_proprietaire = $contact_proprietaire;
    }
    public function getType() {
        return $this->type_vehicule;
    }

    public function setType($type_vehicule) {
        $this->type_vehicule = $type_vehicule;
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

    public function getCoutLocation() {
        return $this->cout_location;
    }

    public function setCoutLocation($cout_location) {
        $this->cout_location = $cout_location;
    }

    public function __construct() {
        $this->id_location = 0;
        $this->id_place = 0;
        $this->marque_vehicule = "";
        $this->matriculation_vehicule = "";
        $this->nom_proprietaire = "";
        $this->contact_proprietaire = "";
        $this->type_vehicule = "";
        $this->date_fin = "";
        $this->cout_location = "";
        parent::__construct(); 
    }

    public function create_location() {
        $stmt = $this->conn->prepare("
        INSERT INTO `location`(`ID_LOCATION`, `ID_PLACE`, `marque_voiture`, `immatriculation_voiture`, `nom_proprietaire`, `contact_proprietaire`, `type_vehicule`, `DATE_DEBUT`, `DATE_FIN`, `COUT_LOCATION`) 
        VALUES (null, :id_place, :marque_voiture, :immatriculation_voiture, :nom_proprietaire, :contact_proprietaire, :type_vehicule, :date_debut, :date_fin, :cout_location)");

        $data = array(
            "id_place" => $this->id_place,
            "marque_voiture" => $this->marque_vehicule,
            "immatriculation_voiture" => $this->matriculation_vehicule,
            "nom_proprietaire" => $this->nom_proprietaire,
            "contact_proprietaire" => $this->contact_proprietaire,
            "type_vehicule" => $this->type_vehicule,
            "date_debut" => $this->date_debut,
            "date_fin" => $this->date_fin,
            "cout_location" => $this->cout_location
        );
        $stmt->execute($data);

        
        
    }
    public function afficher_location() {
        $stmt = $this->conn->prepare("
        SELECT 
        location.ID_LOCATION as location_id,
        location.marque_voiture as v_marque,
        location.nom_proprietaire as p_nom,
        parking.NUM_PLACE as n_place,
        location.DATE_DEBUT as l_debut,
        location.DATE_FIN as l_fin
        FROM location
        INNER JOIN parking ON parking.ID_PLACE = location.ID_PLACE"
        );

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getLocationById() {
        $stmt = $this->conn->prepare("SELECT * FROM location where ID_LOCATION = :id_location");
        $stmt->execute(array("id_location" => $this->id_location));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }

    public function supprimer_location() {
        $stmt = $this->conn->prepare("DELETE FROM location where ID_LOCATION = :id_location");
        $stmt->execute(array("id_location" => $this->id_location));
    }
}

?>
