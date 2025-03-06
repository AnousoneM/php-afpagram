<?php

session_start();

if(isset($_SESSION['user_id'])){
    // on renvoie vers la page d'accueil
    header('Location: controller-profile.php');
    exit;
}

?>



<?php include_once '../View/view-confirmation.php' ?>