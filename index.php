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
        <?php $all = Gender::all(); ?>
        <article class="allGender">

            <?php foreach ($all as $a) : ?>
                <div class="mx-3 my-3 rounded">
                    <h2>
                        <a href="./oneGender.php?id=<?= $a->getId() ?>" class=" badge text-bg-warning rounded-pill gender">

                            <?= $a->getName() ?>
                        </a>
                    </h2>
                </div>
            <?php endforeach ?>
        </article>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top py-4">Ajouter une catégorie</h1>
            <p>
                <input type="text" placeholder="Nom de la catégorie" name="name" class="form-control">
            </p>
            <button type="submit" name="addGender" class="btn btn-primary">Valider</button>
        </form>

    </main>

    <?php include("partials/footer.php") ?>
</body>

</html>