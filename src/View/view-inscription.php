<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <h1 class="text-center my-2 text-white">Inscription</h1>

    <div class="col-lg-6 col-12 mx-auto my-3 bg-light p-4 shadow rounded">

        <form action="" method="POST" novalidate>

            <div class="row g-2 justify-content-center">

                <div class="col-lg-12">
                    <label for="gender" class="form-label">Genre</label>
                    <select class="form-select <?= isset($errors['gender']) ? 'is-invalid' : '' ?>" id="gender" name="gender" required>
                        <option value="" selected disabled>-- Veuillez sélectionner votre genre --</option>
                        <option value="homme" <?= isset($_POST['gender']) && $_POST['gender'] == 'homme' ? 'selected' : '' ?>>Homme</option>
                        <option value="femme" <?= isset($_POST['gender']) && $_POST['gender'] == 'femme' ? 'selected' : '' ?>>Femme</option>
                        <option value="autres" <?= isset($_POST['gender']) && $_POST['gender'] == 'autres' ? 'selected' : '' ?>>Autres</option>
                    </select>
                    <div class="invalid-feedback"><?= $errors['gender'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-sm <?= isset($_POST['lastname']) ? (isset($errors['lastname']) ? 'is-invalid' : 'is-valid') : '' ?>" id="lastname" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" required>
                    <div class="invalid-feedback"><?= $errors['lastname'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control form-control-sm <?= isset($_POST['firstname']) ? (isset($errors['firstname']) ? 'is-invalid' : 'is-valid') : '' ?>" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>" required>
                    <div class="invalid-feedback"><?= $errors['firstname'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="birthdate" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control form-control-sm <?= isset($_POST['birthdate']) ? (isset($errors['birthdate']) ? 'is-invalid' : 'is-valid') : '' ?>" id="birthdate" name="birthdate" value="<?= $_POST['birthdate'] ?? '' ?>" required>
                    <div class="invalid-feedback"><?= $errors['birthdate'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="alias" class="form-label">Pseudo</label>
                    <input type="text" class="form-control form-control-sm <?= isset($_POST['alias']) ? (isset($errors['alias']) ? 'is-invalid' : 'is-valid') : '' ?>" id="alias" name="alias" value="<?= $_POST['alias'] ?? '' ?>" required>
                    <div class="invalid-feedback"><?= $errors['alias'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="email" class="form-label">Mail</label>
                    <input type="email" class="form-control form-control-sm <?= isset($_POST['email']) ? (isset($errors['email']) ? 'is-invalid' : 'is-valid') : '' ?>" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
                    <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control form-control-sm <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" name="password" required>
                    <div class="invalid-feedback"><?= $errors['password'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="confirmPassword" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control form-control-sm <?= isset($errors['confirmPassword']) ? 'is-invalid' : '' ?>" id="confirmPassword" name="confirmPassword" required>
                    <div class="invalid-feedback"><?= $errors['confirmPassword'] ?? '' ?></div>
                </div>

                <div class="col-lg-7">
                    <div class="form-check mt-3 mb-2">
                        <input class="form-check-input <?= isset($errors['cgu']) ? 'is-invalid' : '' ?>" type="checkbox" id="cgu" name="cgu" required>
                        <label class="form-check-label" for="cgu">
                            J'ai compris les conditions d'utilisation générale
                        </label>
                        <div class="invalid-feedback"><?= $errors['cgu'] ?? '' ?></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <button class="btn btn-primary w-100">Validation</button>
                </div>

                <div class="col-lg-12">
                    <a href="../Controller/controller-connexion.php" class="btn btn-outline-secondary w-100">Annuler</a>
                </div>

            </div>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>