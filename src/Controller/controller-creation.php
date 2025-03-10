<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page profile
    header('Location: controller-profile.php');
    exit;
}

require_once '../../config.php';

// un défini un tableau vide qui contiendra les erreurs
$errors = [];

// lancement des test lors d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    var_dump($_POST);
    var_dump($_FILES);

    if ($_FILES['photo']['error'] == 4) {
        $errors['photo'] = 'Veuillez sélecttionner une photo';
    }

    if (empty($_POST['description'])) {
        $errors['description'] = 'Veuillez saisir un commentaire';
    }

    var_dump($errors);

    if (empty($errors)) {

        
        
    }
}

// inclus la view
include_once '../View/view-creation.php';
