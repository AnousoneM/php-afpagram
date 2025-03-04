<?php

require_once '../../config.php';

// --- regex pour le formulaire ---
// uniquement des caractères alpha
$regex_name = "/^[a-zA-Z]+$/";

// genre autorisé
$gender = ['homme', 'femme', 'autre'];

// un défini un tableau vide qui contiendra les erreurs
$errors = [];

// lancement des test lors d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_POST['gender'])) {
        // verifie si la personne a sélectionné une option
        $errors['gender'] = 'champs obligatoire';
    } else if (!in_array($_POST['gender'], $gender)) {
        $errors['gender'] = 'genre inconnu';
    }

    if (isset($_POST['lastname'])) {
        // verifie si champs vide 
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['lastname'])) {
            $errors['lastname'] = 'caractères non autorisés';
        }
    }

    if (isset($_POST['firstname'])) {
        // verifie si champs vide 
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['firstname'])) {
            $errors['firstname'] = 'caractères non autorisés';
        }
    }

    if (isset($_POST['alias'])) {
        // verifie si champs vide 
        if (empty($_POST['alias'])) {
            $errors['alias'] = 'champs obligatoire';
        }
    }

    if (isset($_POST['email'])) {
        // verifie si champs vide 
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
            // verifie si le format du email est ok via filter var
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email non valide';
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'champs obligatoire';
        }
    }

    if (isset($_POST['confirmPassword'])) {
        // verifie si champs vide 
        if (empty($_POST['confirmPassword']) && !empty($_POST['password'])) {
            $errors['confirmPassword'] = 'veuillez confirmer votre mot de passe';
        }
    }

    if (!empty($_POST['password']) && (!empty($_POST['confirmPassword']))) {
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['confirmPassword'] = 'les mots de passe ne sont pas identiques';
        }
    }

    if (isset($_POST['birthdate'])) {
        // verifie si champs vide 
        if (empty($_POST['birthdate'])) {
            $errors['birthdate'] = 'champs obligatoire';
        }
    }

    if (!isset($_POST['cgu'])) {
        $errors['cgu'] = 'Veuillez valider les CGU';
    }

    // au final, si mon tableau d'erreurs est vide alors redirection
    if (empty($errors)) {

        // connexion à la base de données via PDO (PHP Data Objects)
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
}

// inclus la view
include_once '../View/view-inscription.php';
