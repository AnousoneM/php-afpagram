<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <nav class="d-lg-block d-none bg-light position-fixed col-lg-2 vh-100">
        <div class="row flex-column m-0 h-100">

            <h1 class="text-logo text-center py-4">Afpagram</h1>

            <ul class="nav flex-column">
                <li class="nav-item align-center">
                    <a class="nav-link text-dark" href="#"><i class="h4 bi bi-house me-3"></i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="h4 bi bi-search me-3"></i>Recherche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="h4 bi bi-plus-square me-3"></i>Créer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><img src="../../assets/img/nezuko.gif" class="small-avatar border border-secondary rounded-circle me-3" alt="">Profil</a>
                </li>
            </ul>

            <a href="#" class="btn btn-outline-secondary mt-auto">deconnexion</a>

        </div>
    </nav>

    <main class="container p-4 offset-lg-3 col-lg-8 col-12 bg-light">

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
            </div>

        </div>

        <hr>

        <p class="text-center fs-5 mb-1">Publications</p>

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
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>