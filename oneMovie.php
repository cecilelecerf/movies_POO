<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: allMovies.php");
    exit();
}
$movie = new Movie($_GET["id"]);
if (empty($movie->getId())) {
    header("Location: allMovies.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("partials/head.php") ?>
    <title>Accueil</title>
</head>

<body>
    <?php include("partials/header.php") ?>
    <main class="container-fluid">
        <article class="container">

            <h1 class="mb-3">
                <?= $movie->getTitle(); ?>
                <span class="badge text-bg-warning">
                    <?= $movie->getGender()->getName(); ?>
                </span>
            </h1>
            <p>Numéro IMDB : <?= $movie->getImdb() ?></p>
            <p>
                <a href="https://www.imdb.com/title/<?= $movie->getImdb() ?>/?ref_=nm_knf_t_1">
                    -> Voir la page IMDB
                </a>
            </p>

            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                <input type="hidden" name="id" value="<?= $movie->getId() ?>">
                <button type="submit"><i class="bi bi-x-circle"></i></button>
            </form>
        </article>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top pt-4">Modfier <?= $movie->getTitle(); ?> </h1>

            <p>
                <input type="hidden" placeholder="Prénom" name="id" class="form-control" value="<?= $movie->getId() ?>">
            </p>
            <div class="d-flex ">

                <p class="w-50 pe-2">
                    <input type="text" placeholder="Prénom" name="firstname" class="form-control" value="<?= $movie->getTitle() ?>">
                </p>

                <p class="w-50 ps-2">
                    <input type="text" placeholder="Nom de famille" name="lastname" class="form-control" value="<?= $movie->getImdb() ?>">
                </p>
            </div>

            <button type="submit" name="updateMovie" class="btn btn-primary">Valider</button>

        </form>
    </main>

    <footer class="bg-dark-subtle text-light pt-3">
        <div class="container d-flex justify-content-between  ">

            <p>Création le : <?= $movie->getCreatedAt() ?></p>
            <p>Modification le : <?= $movie->getModifiedAt() ?></p>
        </div>

    </footer>
</body>

</html>