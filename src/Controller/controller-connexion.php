<?php

session_start();

require_once '../../config.php';

// un défini un tableau vide qui contiendra les erreurs
$errors = [];

// lancement des test lors d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['identifiant'])) {
        if (empty($_POST['identifiant'])) {
            $errors['identifiant'] = 'champs obligatoire';
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'champs obligatoire';
        }
    }

    if (!empty($_POST['identifiant']) && !empty($_POST['password'])) {

        // connexion à la base de données via PDO (PHP Data Objects) = création instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

        // options activées sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `76_users` WHERE `user_pseudo` = :identifiant OR `user_mail` = :identifiant";

        // on prepare la requete pour se prémunir des injections SQL
        $stmt = $pdo->prepare($sql);

        // on bind la valeur du post
        $stmt->bindValue(':identifiant', $_POST['identifiant'], PDO::PARAM_STR);

        //on execute la requete
        $stmt->execute();

        // on compte les resultats, et nous allons créer une variable $found qui sera un boolean
        $stmt->rowCount() == 0 ? $found = false : $found = true;

        // on stock le resultat de la requête dans un tableau associatif
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($found == false) {
            $errors['connexion'] = 'identifiant ou mot de passe incorrect';
        } else {
            if (password_verify($_POST['password'], $user['user_password'])) {
                $_SESSION = $user;
                header('Location: controller-profile.php');
                exit;
            } else {
                $errors['connexion'] = 'identifiant ou mot de passe incorrect';
            }
        }
    }
}

?>

<?php include_once '../View/view-connexion.php';
