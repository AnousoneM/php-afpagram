<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <?php include '../../templates/navbar.php' ?>

    <main class="container p-3 offset-lg-5 col-lg-4 col-12 bg-light">

        <h1 class="text-center mt-4 mb-2">POST'it!</h1>

        <div class="col-lg-11 col-12 mx-auto my-3 bg-light p-4 shadow rounded">

            <form action="" method="POST" enctype="multipart/form-data" novalidate>

                <div class="row g-2 justify-content-center">

                    <div class="col-lg-12">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control form-control-sm <?= isset($errors['photo']) ? 'is-invalid' : '' ?>" id="photo" name="photo" required>
                        <div class="invalid-feedback">Veuillez selectionner une photo</div>
                    </div>

                    <div class="col-lg-12">
                        <label for="description" class="form-label">Commentaire</label>
                        <textarea class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" rows="6" id="description" name="description" placeholder="Super photo :)" required></textarea>
                        <div class="invalid-feedback">Veuillez saisir un commentaire</div>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn btn-primary mt-3 w-100">Enregistrer</button>
                    </div>

                    <div class="col-lg-12">
                        <a href="../Controller/controller-connexion.php" class="btn btn-outline-secondary w-100">Annuler</a>
                    </div>

                </div>

            </form>
        </div>
    </main>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>