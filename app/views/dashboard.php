<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/dashboard.css">
    <title>Parking MG</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-custom" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase ">
            <i class="fas fa-car me-2" aria-hidden="true"></i><br>Parking MG
            </div>
            <div class="list-group list-group-flush my-3">
                <p onclick="load_content('liste_parking_louer', 'Dashboard')" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </p>
                <p onclick="load_content('historique_view', 'Historique')" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-history me-2"></i>Historique
                </p>
                <p onclick="load_content('ajout_location', 'Assignation')" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-plus me-2"></i>Assigner Location
                </p>
                <p onclick="load_content('ajout_parking', 'Ajouter')" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-plus me-2"></i>Ajouter Parking
                </p>
                <a href="../controller/utilisateurControlleur.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-sign-out me-2"></i>Deconnexion
                </a>
            </div>
        </div>

        <div id="page-content-wrapper" class="custom-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="m-0 fs-2" id="onglet_active">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <p  class="nav-link second-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?=$_SESSION['nom_user']?>
                            </p>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="resultat">
                <?php
                include("liste_parking_louer.php");
                ?>
            </div>
        </div>
    </div>

<script src="../../public/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../public/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../../public/js/crud.js"></script>
</body>
</html>