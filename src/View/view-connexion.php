<?php include_once '../../templates/head.php' ?>

<body class="bg-primary">
    <h1 class="text-white text-center mt-3">Afpa'gram</h1>
    <div class="container">
        <div class="col-6 mx-auto bg-light mt-2 p-3">
            <p class="h2">Connexion</p>
            <label for="mail" class="mt-2 d-block">Identifiant</label>
            <input type="text" name="mail" id="mail">
            <label for="password" class="mt-2 d-block">Mot de passe</label>
            <input type="text" name="password" id="password">
            <button class="btn btn-primary my-3 d-block">Connexion</button>
            <a href="../Controller/controller-inscription.php">Inscription</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>