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
            <p>
                <input type="text" placeholder="Titre du film" name="title" class="form-control">
            </p>
            <p>
                <input type="text" placeholder="Numéro IMDB" name="imdb" class="form-control">
            </p>
            <button type="submit" name="addMovie" class="btn btn-primary">Valider</button>
        </form>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top py-4">Modifier la catégorie</h1>
            <input type="hidden" name="id" class="form-control" value="<?= $gender->getId() ?>">
            <p>
                <input type="text" placeholder="Nom de la catégorie" name="name" class="form-control" value="<?= $gender->getName() ?>">
            </p>
            <div class="d-flex justify-content-between">
                <button type="submit" name="updateGender" class="btn btn-primary">Valider</button>
                <button type="submit" name="deleteGender" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce genre (cela supprimera les films et personnages reliés à celui-ci) ?')">Supprimer</button>
            </div>
        </form>
    </main>

    <footer class="bg-dark-subtle text-light pt-3">
        <div class="container d-flex justify-content-between  ">
            <p>Création le : <?= $gender->getCreatedAt() ?></p>
            <p>Modification le : <?= $gender->getModifiedAt() ?></p>
        </div>

    </footer>
</body>

</html>