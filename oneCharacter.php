<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: allCharacters.php");
    exit();
}
$character = new Character($_GET["id"]);
if (empty($character->getId())) {
    header("Location: allCharacters.php");
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
                <?= $character->getName(); ?>
                <span class="badge text-bg-warning">
                    <a href="oneGender.php?id=<?= $character->getMovie()->getGender_id(); ?>">
                        <?= $character->getMovie()->getGender()->getName(); ?>
                    </a>
                </span>
            </h1>
            <p>Dans le film : <a href="oneMovie.php?id=<?= $character->getMovie_id() ?>">
                    <?= $character->getMovie()->getTitle() ?>
                </a></p>
        </article>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top py-4">Modifier <?= $character->getName() ?></h1>
            <input type="hidden" name="id" class="form-control" value="<?= $character->getId() ?>">
            <p>
                <input type="text" placeholder="Nom du personnage" name="name" class="form-control" value="<?= $character->getName() ?>">
            </p>
            <select class="form-select mb-3" aria-label="Default select example" name="movie_id">
                <<?php $all = Movie::all();
                    foreach ($all as $a) :
                        $a->getId() === $character->getMovie_id() ? $selected = "selected" : $selected = "";
                    ?> <option <?= $selected ?> value="<?= $a->getId() ?>"><?= $a->getTitle() ?></option>
                <?php endforeach ?>
            </select>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="updateCharacter">Valider</button>
                <button type="submit" class="btn btn-danger" name="deleteCharacter">Supprimer</button>
            </div>
        </form>
    </main>

    <footer class="bg-dark-subtle text-light pt-3">
        <div class="container d-flex justify-content-between  ">

            <p>Création le : <?= $character->getCreatedAt() ?></p>
            <p>Modification le : <?= $character->getModifiedAt() ?></p>
        </div>

    </footer>
</body>

</html>