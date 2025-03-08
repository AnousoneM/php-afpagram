<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">

    <?php include '../../templates/navbar.php' ?>

    <main class="container p-3 offset-lg-5 col-lg-4 col-12 bg-light">

        <?php
        // boucle permettant d'afficher tous les posts du users et des favoris
        foreach ($allPosts as $post) { ?>

            <div class="pt-3 pb-3 border-bottom">
                <p><span class="fw-bold me-1"><?= $post['user_pseudo'] ?></span><span class="post-date"><i class="bi bi-dot"></i> 23/05/2024 18h00</span></p>
                <img src="../../assets/img/users/<?= $post['user_id'] . '/' . $post['pic_name'] ?>" class="img-fluid mb-2" alt="<?= $post['pic_name'] ?>">
                <div>
                    <a class="text-dark" href="#"><i class="bi bi-heart me-2 fw-bold"></i></a>
                    <a class="text-dark" href="#"><i class="bi bi-chat me-2 fw-b"></i></a>
                </div>
                <p class="my-1 fw-bold">33 J'aime</p>
                <p class="my-1"><span class="fw-bold me-1">Johnny</span><?= $post['post_description']?></p>
                <a href="#" class="com-show">Afficher les 3 commentaires</a>
                <a href="#" class="com-add">Ajouter un commentaire ...</a>
            </div>
        <?php } ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>