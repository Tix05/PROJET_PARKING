<?php
    require_once("../model/parking.php");
    if(isset($_POST['idQuartier']) 
    AND isset($_POST['numPlace']) 
    AND isset($_POST['typePlace']) 
    // AND isset($_POST['disponibilite'])) {
    ){
        extract($_POST);
        $parkingAdd = new Parking();
        $parkingAdd->setIdQuartier(intval($idQuartier));
        $parkingAdd->setNumPlace(intval($numPlace));
        $parkingAdd->setTypePlace($typePlace);
        // $parkingAdd->setDisponibilite($disponibilite);
        $ajout = $parkingAdd->create_parking();
        include("../views/ajout_parking.php");
    } 
    // lister();
    // function lister() {
    //     $parking = new Parking();
    //     $donne = $parking-> afficher_parking();
    // }    
?>