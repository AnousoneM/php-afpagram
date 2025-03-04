<?php
// regex pour le formulaire
// uniquement des caractères alpha
$regex_name = "/^[a-zA-Z]+$/";

// un défini un tableau vide
$errors = [];

// lancement des test lors d'un post via formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    var_dump($_POST);

    if (!isset($_POST['gender'])) {
        // verifie si champs vide 
        $errors['gender'] = 'champs obligatoire';
    }

    if (isset($_POST['lastname'])) {
        // verifie si champs vide 
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['lastname'])) {
            $errors['lastname'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['firstname'])) {
        // verifie si champs vide 
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['firstname'])) {
            $errors['firstname'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['mail'])) {
        // verifie si champs vide 
        if (empty($_POST['mail'])) {
            $errors['mail'] = 'champs obligatoire';
            // verifie si le format du mail est ok via filter var
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = 'mail non valide';
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'champs obligatoire';
        } else if (!empty($_POST['password']) && ($_POST['password'] != $_POST['confirmPassword'])) {
            $errors['confirmPassword'] = 'les mots de passe ne sont pas identique';
        }
    }

    if (isset($_POST['birthdate'])) {
        // verifie si champs vide 
        if (empty($_POST['birthdate'])) {
            $errors['birthdate'] = 'champs obligatoire';
        }
    }

    if (!isset($_POST['utilisation'])) {
        $errors['utilisation'] = 'Veuillez valider les CGU';
    }

    // au final, si mon tableau d'erreurs est vide alors redirection
    // if (empty($errors)) {
    //     header('Location: welcome.php');
    //     exit;
    // }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afpa'gram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-primary">

    <h1 class="text-center my-2 text-white">Inscription</h1>

    <div class="container">
        <div class="col-5 mx-auto bg-light p-4 shadow rounded">

            <form action="" method="POST" novalidate>

                <label for="gender">Genre : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['gender'] ?? '' ?></span>
                <select class="d-block mb-3" name="gender" id="gender" type="select" required>
                    <option value="" selected disabled>Veuillez sélectionner votre genre</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autres">Autres</option>
                </select>

                <label for="lastname">Nom : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['lastname'] ?? '' ?></span>
                <input class="d-block mb-3" name="lastname" id="lastname" type="text" placeholder="ex. DURANT" value="<?= $_POST['lastname'] ?? '' ?>" required>

                <label for="firstname">Prénom : </label>
                <span class="text-danger fw-lighter fst-italic"><?= ($errors['firstname']) ?? '' ?></span>
                <input class="d-block mb-3" name="firstname" id="firstname" type="text" placeholder="ex. Guy" value="<?= $_POST['firstname'] ?? '' ?>" required>

                <label for="mail">Mail : </label>
                <span class="text-danger fw-lighter fst-italic"><?= ($errors['mail']) ?? '' ?></span>
                <input class="d-block mb-3" name="mail" id="mail" type="text" placeholder="ex. mon-mail@courriel.fr" value="<?= $_POST['mail'] ?? '' ?>" required>

                <label for="password">Mot de passe : </label>
                <span class="text-danger fw-lighter fst-italic"><?= ($errors['password']) ?? '' ?></span>
                <input class="d-block mb-3" name="password" id="password" type="password" required>


                <label for="confirmPassword">Confirmation du mot de passe : </label>
                <span class="text-danger fw-lighter fst-italic"><?= ($errors['confirmPassword']) ?? '' ?></span>
                <input class="d-block mb-3" name="confirmPassword" id="confirmPassword" type="password" required>

                <label for="birthdate">Date de naissance : </label>
                <span class="text-danger fw-lighter fst-italic"><?= ($errors['birthdate']) ?? '' ?></span>
                <input class="d-block mb-3" name="birthdate" id="birthdate" type="date" placeholder="ex. Guy" value="<?= $_POST['birthdate'] ?? '' ?>" required>

                <span class="text-danger fw-lighter fst-italic d-block"><?= ($errors['utilisation']) ?? '' ?></span>
                <input class="mb-3" name="utilisation" id="utilisation" type="checkbox" required>
                <label for="utilisation">J'ai compris les conditions d'utilisation générale</label>

                <button class="btn btn-outline-primary col-6 mt-3">Validation</button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>