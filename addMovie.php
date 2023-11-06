<?php
require("config/settings.php");
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
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="pb-4">Ajouter un film</h1>
            <p>
                <input type="text" placeholder="Titre du film" name="title" class="form-control">
            </p>
            <p>
                <input type="text" placeholder="Numéro IMDB" name="imdb" class="form-control">
            </p>
            <select class="form-select mb-3" aria-label="Default select example" name="gender_id">
                <option selected>Sélectionner le genre</option>

                <?php $tests = Gender::all();
                foreach ($tests as $test) :
                ?>
                    <option value="<?= $test->getId() ?>"><?= $test->getName() ?></option>
                <?php endforeach ?>
            </select>
            <button type="submit" class="btn btn-primary" name="addMovie">Valider</button>

        </form>
    </main>

    <?php include("partials/footer.php") ?>
</body>

</html>