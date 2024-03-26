<?php
    require_once("../model/utilisateur.php");
    if(isset($_POST["email"]) and isset($_POST["pass"])){
        extract($_POST);
        login($email, $pass);
    }else{
        logout();
    }

    function login($email, $pass) {
        $user = new Utilisateur();
        $user->setLoginUser($email);
        $user->setMdpUser($pass);
        if( $user->verify_user() != null) {
            session_start();
            $_SESSION['nom_user'] = $user->getNomUser(); 
            sleep(3);
            header("Location: ./acceuilControlleur.php");
            
        }else{
            echo"tsisy lty ah tsisy";
        }
    }
    function logout() {
        session_start();
        session_destroy();
        include("../views/login.php");
    }
?>