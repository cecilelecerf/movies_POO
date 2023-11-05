<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$gender = new Gender($_GET["id"]);
if (empty($gender->getId())) {
    header("Location: index.php");
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
    <main class="container">
        <h1><?= $gender->getName() ?></h1>
        <?php $movies = Movie::allCondition($gender->getId());
        if (empty($movies)) :

        ?>
            <p>Le genre n'a pas de film</p>
        <?php else : ?>

            <table class="table container table-hover">
                <thead>
                    <tr>
                        <th>Nom du film</th>
                        <th>IMDB</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($movies as $movie) :  ?>
                        <tr onClick="document.location.href='oneMovie.php?id=<?= $movie->getId() ?>'">
                            <td>
                                <?= $movie->getTitle(); ?>
                            </td>
                            <td>
                                <?= $movie->getImdb() ?>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top pt-4">Ajouter un film</h1>

            <p>
                <input type="hidden" name="gender_id" class="form-control" value="<?= $gender->getId() ?>">
            </p>

            <p class="w-50 pe-2">
                <input type="text" placeholder="Titre du film" name="title" class="form-control">
            </p>

            <p class="w-50 ps-2">
                <input type="text" placeholder="Numéro IMDB" name="imdb" class="form-control">
            </p>

            <button type="submit" name="addMovie" class="btn btn-primary">Valider</button>

        </form>
    </main>


</body>

</html>