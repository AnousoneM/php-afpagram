<nav class="d-lg-none d-block bg-dark text-white text-center fixed-bottom">

    <div class="row justify-content-evenly m-0 p-2">

        <div class="col">
            <a class="nav-link" href="../Controller/controller-home.php"><i class="bi bi-house fs-4"></i></a>
        </div>

        <div class="col">
            <a class="nav-link" href="#"><i class="bi bi-search fs-4"></i></a>
        </div>

        <div class="col">
            <a class="nav-link" href="../Controller/controller-creation.php"><i class="bi bi-plus-square fs-4"></i></a>
        </div>

        <div class="col">
            <a class="nav-link" href="../Controller/controller-profile.php"><img src="../../assets/img/users/<?= $_SESSION['user_id'] . '/avatar/' . $_SESSION['user_avatar'] ?>" class="nav-avatar border border-secondary rounded-circle" alt=""></a>
        </div>

        <div class="col">
            <a class="nav-link" href="../Controller/controller-deconnexion.php"><i class="bi bi-box-arrow-right fs-4"></i></a>
        </div>

    </div>

</nav>