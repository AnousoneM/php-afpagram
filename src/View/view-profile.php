<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <div class="container p-4 w-50 bg-light">

        <div class="row m-0">

            <div class="col-3">
                <img src="../../assets/img/nezuko.gif" class="img-fluid rounded-circle" alt="Nezuko">
            </div>

            <div class="col-9 px-4">
                <div class="row justify-content-start align-items-center">
                    <div class="col-4">
                        <p class="d-inline display-5 my-4 fw-bold"><?= $_SESSION['user_pseudo'] ?></p><i class="bi bi-patch-check-fill ms-2 fs-4 text-primary"></i>
                    </div>
                    <div class="col-3">
                        <a href="#" class="btn btn-outline-primary w-100">profil</a>
                    </div>
                    <div class="col-3">
                        <a href="../Controller/controller-deconnexion.php" class="btn btn-primary w-100">déconnexion</a>
                    </div>
                </div>
                <div class="row justify-content-start align-items-center fs-5">
                    <p class="col-3 my-3"><b><?= count($allPosts) ?></b> publication</p>
                    <p class="col-3 my-3"><b>123</b> followers</p>
                    <p class="col-3 my-3"><b>355</b> suivi(e)s</p>
                </div>
                <div class="text-start mt-3">
                    <button class="btn btn-outline-primary col-2"><i class="bi bi-plus display-4"></i></button>
                    <p class="text-secondary text-center col-2 m-0">Ajouter un post</p>
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