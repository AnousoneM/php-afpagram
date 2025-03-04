<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <h1 class="text-center my-2 text-white">Inscription</h1>

    <div class="container">
        <div class="col-5 mx-auto bg-light p-4 shadow rounded">

            <form action="" method="POST" novalidate>

                <label for="gender">Genre : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['gender'] ?? '' ?></span>
                <select class="d-block mb-3" name="gender" id="gender" type="select" required>
                    <option value="" selected disabled>Veuillez sélectionner votre genre</option>
                    <option value="homme" <?= isset($_POST['gender']) && $_POST['gender'] == 'homme' ? 'selected' : '' ?>>Homme</option>
                    <option value="femme" <?= isset($_POST['gender']) && $_POST['gender'] == 'femme' ? 'selected' : '' ?>>Femme</option>
                    <option value="autres" <?= isset($_POST['gender']) && $_POST['gender'] == 'autres' ? 'selected' : '' ?>>Autres</option>
                </select>

                <label for="lastname">Nom : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['lastname'] ?? '' ?></span>
                <input class="d-block mb-3" name="lastname" id="lastname" type="text" placeholder="ex. DURANT" value="<?= $_POST['lastname'] ?? '' ?>" required>

                <label for="firstname">Prénom : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['firstname'] ?? '' ?></span>
                <input class="d-block mb-3" name="firstname" id="firstname" type="text" placeholder="ex. Guy" value="<?= $_POST['firstname'] ?? '' ?>" required>

                <label for="birthdate">Date de naissance : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['birthdate'] ?? '' ?></span>
                <input class="d-block mb-3" name="birthdate" id="birthdate" type="date" placeholder="ex. Guy" value="<?= $_POST['birthdate'] ?? '' ?>" required>

                <label for="alias">Pseudo : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['alias'] ?? '' ?></span>
                <input class="d-block mb-3" name="alias" id="alias" type="text" placeholder="ex. DURANT" value="<?= $_POST['alias'] ?? '' ?>" required>

                <label for="mail">Mail : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['mail'] ?? '' ?></span>
                <input class="d-block mb-3" name="mail" id="mail" type="text" placeholder="ex. mon-mail@courriel.fr" value="<?= $_POST['mail'] ?? '' ?>" required>

                <label for="password">Mot de passe : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['password'] ?? '' ?></span>
                <input class="d-block mb-3" name="password" id="password" type="password" required>

                <label for="confirmPassword">Confirmation du mot de passe : </label>
                <span class="text-danger fw-lighter fst-italic"><?= $errors['confirmPassword'] ?? '' ?></span>
                <input class="d-block mb-3" name="confirmPassword" id="confirmPassword" type="password" required>

                <span class="text-danger fw-lighter fst-italic d-block"><?= $errors['utilisation'] ?? '' ?></span>
                <input class="mb-3" name="utilisation" id="utilisation" type="checkbox" required>
                <label for="utilisation">J'ai compris les conditions d'utilisation générale</label>

                <button class="btn btn-primary col-6 mt-3">Validation</button>
                <a href="../Controller/controller-connexion.php" class="btn btn-outline-secondary col-6 mt-3">Annuler</button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>