<?php
    require_once("../model/location.php");
    require_once("../model/parking.php");
    if(isset($_POST['numPlace']) 
    AND isset($_POST['nomVoiture']) 
    AND isset($_POST['nomProprietaire']) 
    AND isset($_POST['contactProprietaire']) 
    AND isset($_POST['numMatriculation']) 
    AND isset($_POST['typeVehicule'])
    AND isset($_POST['coutLocation'])
    AND isset($_POST['dateDebut']) 
    AND isset($_POST['dateFin'])) {
        extract($_POST);
        $parking = new Parking();
        $location = new Location();
        $location->setIdPlace(intval($numPlace));
        $location->setMarqueVehicule($nomVoiture);
        $location->setNomProprietaire($nomProprietaire);
        $location->setContactProprietaire($contactProprietaire);
        $location->setIMatriculationVoiture($numMatriculation);
        $location->setType($typeVehicule);
        $location->setCoutLocation($coutLocation);
        $location->setDateDebut($dateDebut);
        $location->setDateFin($dateFin);
        $location->create_location(); 
        $parking ->setIdPlace($numPlace);
        $parking->setDisponibilite(0);
        $parking->update_disponibilite();

        $donne = $parking-> afficher_parking();
        include ("../views/ajout_location.php");
    }
?>