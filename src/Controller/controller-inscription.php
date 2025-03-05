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

    // connexion à la base de données via PDO (PHP Data Objects) = création instance
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

    // options activées sur notre instance
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // on stock notre requete avec les marqueurs
    $sql = "SELECT * FROM `76_users` WHERE `user_pseudo` = :pseudo";

    // on prepare la requete pour se prémunir des injections SQL
    $stmt = $pdo->prepare($sql);

    // on bind la valeur du post
    $stmt->bindValue(':pseudo', $_POST['alias'], PDO::PARAM_STR);

    //on execute la requete
    $stmt->execute();

    // on compte les resultats, et nous allons créer une variable $found qui sera un boolean
    $stmt->rowCount() == 0 ? $found = false : $found = true;

    // on détruit notre instance PDO.
    $pdo = '';

    if (isset($_POST['alias'])) {
        // verifie si champs vide 
        if (empty($_POST['alias'])) {
            $errors['alias'] = 'champs obligatoire';
        } else if ($found == true) {
            $errors['alias'] = 'Pseudo non disponible';
        }
    }

    // connexion à la base de données via PDO (PHP Data Objects) = création instance
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

    // options activées sur notre instance
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // on stock notre requete avec les marqueurs
    $sql = "SELECT * FROM `76_users` WHERE `user_mail` = :mail";

    // on prepare la requete pour se prémunir des injections SQL
    $stmt = $pdo->prepare($sql);

    // on bind la valeur du post
    $stmt->bindValue(':mail', $_POST['email'], PDO::PARAM_STR);

    //on execute la requete
    $stmt->execute();

    // on compte les resultats, et nous allons créer une variable $found qui sera un boolean
    $stmt->rowCount() == 0 ? $found = false : $found = true;

    // on détruit notre instance PDO.
    $pdo = '';

    if (isset($_POST['email'])) {
        // verifie si champs vide 
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
            // verifie si le format du email est ok via filter var
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email non valide';
        } else if ($found == true) {
            $errors['email'] = 'Email déjà utilisé';
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

        // connexion à la base de données via PDO (PHP Data Objects) = création instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

        // options activées sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //on stock notre requête avec des marqueurs nominatifs
        $sql = "INSERT INTO
        `76_users` (
            `user_gender`,
            `user_lastname`,
            `user_firstname`,
            `user_pseudo`,
            `user_birthdate`,
            `user_mail`,
            `user_password`
        ) VALUES (
            :gender,
            :lastname,
            :firstname,
            :pseudo,
            :birthdate,
            :mail,
            :password
        );";

        // on prépare la requête avant de l'exécuter
        $stmt = $pdo->prepare($sql);

        // fonction permettant de nettoyer les inputs
        function safeInput($string)
        {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }

        $stmt->bindValue(':gender', safeInput($_POST['gender']), PDO::PARAM_STR);
        $stmt->bindValue(':lastname', safeInput($_POST['lastname']), PDO::PARAM_STR);
        $stmt->bindValue(':firstname', safeInput($_POST['firstname']), PDO::PARAM_STR);
        $stmt->bindValue(':pseudo', safeInput($_POST['alias']), PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', safeInput($_POST['birthdate']), PDO::PARAM_STR);
        $stmt->bindValue(':mail', safeInput($_POST['email']), PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

        // on test si la requête s'execute
        if ($stmt->execute()) {
            header('Location: controller-confirmation.php');
            exit;
        }

        // on supprime l'instance pdo
        $pdo = '';
    }
}

// inclus la view
include_once '../View/view-inscription.php';
