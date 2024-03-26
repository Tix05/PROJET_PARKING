<?php
require_once('../model/connexion.php');

class Parking extends Connexion {
    private $id_place;
    private $id_quartier;
    private $num_place;
    private $type_place;
    private $disponibilite;

    public function getIdPlace() {
        return $this->id_place;
    }

    public function setIdPlace($id_place) {
        $this->id_place = $id_place;
    }

    public function getIdQuartier() {
        return $this->id_quartier;
    }

    public function setIdQuartier($id_quartier) {
        $this->id_quartier = $id_quartier;
    }

    public function getNumPlace() {
        return $this->num_place;
    }

    public function setNumPlace($num_place) {
        $this->num_place = $num_place;
    }

    public function getTypePlace() {
        return $this->type_place;
    }

    public function setTypePlace($type_place) {
        $this->type_place = $type_place;
    }

    public function getDisponibilite() {
        return $this->disponibilite;
    }

    public function setDisponibilite($disponibilite) {
        $this->disponibilite = $disponibilite;
    }

    public function __construct() {
        $this->id_place = 0;
        $this->id_quartier = 0;
        $this->num_place = 0;
        $this->type_place = "";
        $this->disponibilite = 0;
        parent::__construct(); 
    }

    public function create_parking() {
        $stmt = $this->conn->prepare("INSERT INTO `parking`(`ID_QUARTIER`, `NUM_PLACE`, `TYPE_PLACE`, `DISPONIBILITE`) 
        VALUES (:id_quartier,:num_place,:type_place,true)");
        $data = array(
            "id_quartier" => $this->id_quartier,
            "num_place" => $this->num_place,
            "type_place" => $this->type_place,
        );
        $stmt->execute($data);
    }

    public function afficher_parking() {
        $stmt = $this->conn->prepare("SELECT parking.ID_PLACE as id_p, parking.NUM_PLACE as p_num, parking.TYPE_PLACE as p_place FROM parking where DISPONIBILITE = 1");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update_disponibilite() {
        $stmt = $this->conn->prepare("
        UPDATE `parking` SET `DISPONIBILITE`= :dispo WHERE `ID_PLACE` = :id_place ");
        $data = array(
            "dispo" => $this->disponibilite,
            "id_place" => $this->id_place,
        );
        $stmt->execute($data); 
    }

    public function nombre_parking() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS nbr_parking  FROM parking");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result != null) {
            return $result[0]['nbr_parking'];
        }else{
            return 0;
        }
    }
    
    public function nombre_parking_louees() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS nbr_parking  FROM parking where disponibilite = 0");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result != null) {
            return $result[0]['nbr_parking'];
        }else{
            return 0;
        }
    }
    
}

?>
