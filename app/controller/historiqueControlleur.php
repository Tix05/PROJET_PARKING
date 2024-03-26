<?php
    require_once("../model/location.php");
    require_once("../model/parking.php");
    require_once("../model/historique.php");
    $location = new Location();
    $parking = new Parking();
    $history = new Historique();
    if(isset($_POST['id_location'])) {
        extract($_POST);
        $location->setIdLocation($id_location);
        $resultat = $location->getLocationById();
        $parking->setIdPlace($resultat['ID_PLACE']);
        $parking->setDisponibilite(1);
        $parking->update_disponibilite();
        $history->setIdLocation($id_location);
        $history->setNomProprietaire($resultat['nom_proprietaire']);
        $history->setMarqueVehicule($resultat['marque_voiture']);
        $history->setDateDebut($resultat['DATE_DEBUT']);
        $history->setDateFin($resultat['DATE_FIN']);
        $history->create_history();
        $location->supprimer_location();
        $data = $location-> afficher_location();
        $nbr_parking = $parking->nombre_parking();
        $annee = $history->pourcentage_location()['annee'];
        $pourcentage = $history->pourcentage_location()['pourcentage'];
        include ("../views/liste_parking_louer.php");

    }

?>