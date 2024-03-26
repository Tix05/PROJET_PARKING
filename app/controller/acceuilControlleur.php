<?php
 require_once("../model/location.php");
 require_once("../model/parking.php");
 require_once("../model/historique.php");
 session_start();
 if (isset($_SESSION['nom_user'])) {
    dashboard();
 }else{
    header("Location: ./utilisateurControlleur.php ");
 }
 
function dashboard() {
    $parking = new Parking();
    $historique = new Historique();
    $location = new Location();
    $data = $location-> afficher_location();
    $nbr_parking = $parking->nombre_parking();
    $annee = $historique->pourcentage_location()['annee'];
    $pourcentage = $historique->pourcentage_location()['pourcentage'];
    include ("../views/dashboard.php");
} 
?>