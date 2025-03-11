<?php

session_start();

// on désatribue la variable $_SESSION à l'aide de unset()
unset($_SESSION);

// on détruit la session à l'aide session_destroy
session_destroy();

?>


<?php include_once '../View/view-deconnexion.php' ?>