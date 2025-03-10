<nav class="d-lg-block d-none bg-light position-fixed col-lg-2 vh-100">
    <div class="row flex-column m-0 h-100">

        <h1 class="text-logo text-center py-4">Afpagram</h1>

        <ul class="nav flex-column ps-2">
            <li class="nav-item align-center">
                <a class="nav-link text-dark" href="../Controller/controller-home.php"><i class="h4 bi bi-house me-3"></i>Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#"><i class="h4 bi bi-search me-3"></i>Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="../Controller/controller-creation.php"><i class="h4 bi bi-plus-square me-3"></i>Créer</a>
            </li>
            <li class="nav-item">
                <a class="mt-1 nav-link text-dark" href="../Controller/controller-profile.php"><img src="../../assets/img/users/<?= $_SESSION['user_id'] . '/avatar/' . $_SESSION['user_avatar'] ?>" class="small-avatar border border-secondary rounded-circle me-3" alt="">Profil</a>
            </li>
        </ul>

        <a href="../Controller/controller-deconnexion.php" class="btn btn-sm btn-outline-secondary mt-auto mb-3 w-75 mx-auto">déconnexion</a>

    </div>
</nav>