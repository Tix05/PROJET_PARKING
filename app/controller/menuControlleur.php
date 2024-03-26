<?php
    require_once("../model/location.php");
    require_once("../model/parking.php");
    require_once("../model/historique.php");
    session_start();

    if(isset($_GET["onglet"])){
        extract($_GET);
        switch($onglet) {
            case "Dashboard":
                dashboard();
                break;
            case "Historique":
                historique();
                break;
            case "Assignation":
                assignation();
                break;
            case "Ajouter":
                Ajouter();
                break;
            default:
                echo 'bogosy mr Fabrice';
        }
    }

    function dashboard() {
        $historique = new Historique();
        $parking = new Parking();
        $location = new Location();
        $data = $location-> afficher_location();
        $nbr_parking = $parking->nombre_parking();
        $annee = $historique->pourcentage_location()['annee'];
        $pourcentage = $historique->pourcentage_location()['pourcentage'];
        include ("../views/liste_parking_louer.php");

    }
    function historique() {
        $historique = new Historique();
        $history = $historique-> afficher_historique();
        include ("../views/historique_view.php");

    }
    function assignation() {
        $parking = new Parking();
        $donne = $parking-> afficher_parking();
        include ("../views/ajout_location.php");
    }
    function ajouter() {
        
        include("../views/ajout_parking.php");
    }
?>