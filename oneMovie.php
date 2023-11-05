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
                    <a href="oneGender.php?id=<?= $movie->getGender_id(); ?>">
                        <?= $movie->getGender()->getName(); ?>
                    </a>
                </span>
            </h1>
            <p>Numéro IMDB : <?= $movie->getImdb() ?></p>
            <p>
                <a href="https://www.imdb.com/title/<?= $movie->getImdb() ?>/?ref_=nm_knf_t_1">
                    -> Voir la page IMDB
                </a>
            </p>
            <?php $characters = Character::allCondition($movie->getId());
            if (empty($characters)) :
            ?>
                <p>Le film n'a pas de personnage enregistré</p>
            <?php else : ?>
                <div class="allGender">
                    <?php foreach ($characters as $character) :  ?>
                        <h2 class="mx-3 my-3">
                            <a href="./oneCharacter.php?id=<?= $character->getId() ?>" class=" badge text-bg-secondary rounded-pill gender">
                                <?= $character->getName() ?>
                            </a>
                        </h2>
                    <?php endforeach; ?>
                </div>


            <?php endif ?>

        </article>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top py-4">Ajouter un personnage</h1>
            <p>
                <input type="text" placeholder="Nom du personnage" name="name" class="form-control">
            </p>
            <p>
                <input type="hidden" placeholder="Nom du personnage" name="movie_id" class="form-control" value="<?= $movie->getId() ?>">
            </p>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="addCharacter">Valider</button>
            </div>
        </form>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top py-4">Modifier un film</h1>
            <input type="hidden" placeholder="Titre du film" name="id" class="form-control" value="<?= $movie->getId() ?>">
            <p>
                <input type="text" placeholder="Titre du film" name="title" class="form-control" value="<?= $movie->getTitle() ?>">
            </p>
            <p>
                <input type="text" placeholder="Numéro IMDB" name="imdb" class="form-control" value="<?= $movie->getImdb() ?>">
            </p>
            <select class="form-select mb-3" aria-label="Default select example" name="gender_id">
                <!-- <option selected>Sélectionner le genre</option> -->

                <<?php $all = Gender::all();
                    foreach ($all as $a) :
                        $a->getId() === $movie->getGender_id() ? $selected = "selected" : $selected = "";
                    ?> <option <?= $selected ?> value="<?= $a->getId() ?>"><?= $a->getName() ?></option>
                <?php endforeach ?>
            </select>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="updateMovie">Valider</button>
                <button type="submit" class="btn btn-danger" name="deleteMovie">Supprimer</button>
            </div>
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