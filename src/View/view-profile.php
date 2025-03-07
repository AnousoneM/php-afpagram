<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <div class="container p-4 col-lg-6 col-12 bg-light">

        <div class="row mt-lg-4 mx-0">

            <div class="col-lg-3">
                <img src="../../assets/img/nezuko.gif" class="img-fluid rounded-circle" alt="Nezuko">
            </div>

            <div class="col-lg-9 px-4 border">
                <div class="row justify-content-start align-items-center">
                    <div class="col text-center">
                        <p class="d-inline display-6 my-4 fw-bold"><?= $_SESSION['user_pseudo'] ?></p><i class="bi bi-patch-check-fill ms-2 fs-4 text-primary"></i>
                    </div>
                    <div class="col-lg-3 text-center">
                        <a href="#" class="btn btn-sm btn-outline-primary w-100">paramètres</a>
                    </div>
                    <div class="col-lg-3 text-center">
                        <a href="../Controller/controller-deconnexion.php" class="btn btn-sm btn-primary w-100">déconnexion</a>
                    </div>
                </div>
                <div class="row text-center align-items-center">
                    <p class="col my-3"><b><?= count($allPosts) ?></b> publication</p>
                    <p class="col my-3"><b>123</b> followers</p>
                    <p class="col my-3"><b>355</b> suivi(e)s</p>
                </div>
                <div class="text-start mt-3">
                    <button class="btn btn-outline-primary me-lg-0 me-3 col-lg-2"><i class="bi bi-plus display-4"></i></button>
                    <p class="d-lg-block d-inline text-secondary text-center col-lg-2 m-0">Ajouter un post</p>
                </div>
            </div>

        </div>

        <hr>

        <p class="text-center fs-3 mb-1">Publications</p>

        <div class="row row-cols-lg-3 row-cols-1 g-lg-1">

            <?php 
            // boucle pour afficher les photos
            foreach ($allPosts as $post) { ?>
                <div class="col">
                    <div class="photo">
                        <img src="../../assets/img/users/<?= $post['user_id'] . '/' . $post['pic_name'] ?>" alt="une image">
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>