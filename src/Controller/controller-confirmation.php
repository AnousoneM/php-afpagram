<?php

session_start();

// on verifie si la personne est toujours connectée
if (isset($_SESSION['user_id'])) {
    // on renvoie vers la page profile
    header('Location: controller-profile.php');
    exit;
}

?>

<?php include_once '../View/view-confirmation.php' ?>