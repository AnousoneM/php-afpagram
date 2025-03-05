<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <h1 class="text-center my-2 text-white">Connexion</h1>

    <div class="col-lg-4 col-12 mx-auto my-3 bg-light p-4 shadow rounded">

        <form action="" method="POST" novalidate>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-12">
                    <label for="identifiant" class="form-label">Identifiant</label>
                    <input type="text" class="form-control form-control-sm <?= isset($_POST['identifiant']) ? (isset($errors['identifiant']) ? 'is-invalid' : 'is-valid') : '' ?>" id="identifiant" name="identifiant" value="<?= $_POST['identifiant'] ?? '' ?>" required>
                    <div class="invalid-feedback"><?= $errors['identifiant'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                    <div class="invalid-feedback"><?= $errors['password'] ?? '' ?></div>
                </div>

                <div class="col-lg-12">
                    <p class="text-danger text-center"><?= $errors['connexion'] ?? '' ?></p>
                    <button class="btn btn-primary w-100">Connexion</button>
                </div>

                <div class="col-lg-12 text-center">
                    <a href="../Controller/controller-inscription.php" class="text-decoration-none">Pas de compte ? Je m'inscris</a>
                </div>

            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>