<?php
require_once('../controller/utilisateurControlleur.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/login.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Parking MG</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header class="txt">Bienvenue</header>
                       <form action="../controller/utilisateurControlleur.php" method="post">
                        <div class="input-field">
                                <input type="text" class="input" id="email" required name="email" required>
                                <label for="email">Email</label> 
                            </div>
                        <div class="input-field">
                                <input type="password" class="input" id="pass" name="pass" required>
                                <label for="pass">Mot de passe</label>
                            </div> 
                        <div class="input-field">
                                <button type="submit" class="submit">Se Connecter</button>
                                <p class="text-center">Admin</p>
                        </div> 
                        </form>
                        
                    </div>  
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

