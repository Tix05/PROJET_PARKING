<?php
require_once('../model/connexion.php');
class Utilisateur extends Connexion{
    private $id_utilisateur;
    private $id_quartier;
    private $nom_user;
    private $login_user;
    private $mdp_user;

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getIdQuartier() {
        return $this->id_quartier;
    }

    public function setIdQuartier($id_quartier) {
        $this->id_quartier = $id_quartier;
    }

    public function getNomUser() {
        return $this->nom_user;
    }

    public function setNomUser($nom_user) {
        $this->nom_user = $nom_user;
    }

    public function getLoginUser() {
        return $this->login_user;
    }

    public function setLoginUser($login_user) {
        $this->login_user = $login_user;
    }

    public function getMdpUser() {
        return $this->mdp_user;
    }

    public function setMdpUser($mdp_user) {
        $this->mdp_user = $mdp_user;
    }
    public function __construct() {
        $this->id_utilisateur = 0;
        $this->id_quartier = 0;
        $this->nom_user = "";
        $this->login_user = "";
        $this->mdp_user = "";
        parent::__construct(); 
    }

    public function create_user() {
        $stmt = $this->conn->prepare("INSERT INTO utilisateurs (null, id_quartier, nom_user, login_user, mdp_user) VALUES (:id_quartier, :nom_user, :login_user, :mdp_user )");
        $data = array(
            "id_quartier" => $this->id_quartier, 
            "nom_user" => $this->nom_user,
            "login_user" => $this->login_user,
            "mdp_user" => $this->mdp_user
        );
        $stmt->execute($data);
    }

    public function verify_user() {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE login_user = :login AND mdp_user = :mdp");
        $data = array(
            "login" => $this->login_user,
            "mdp" => $this->mdp_user
        );
        $stmt->execute($data);
        $result = $stmt->fetchAll();
        if($result != null) {
        $this->nom_user = $result[0]['NOM_USER'];
        }
        return $result;
        
    }

}
?>