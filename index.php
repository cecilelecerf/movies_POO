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
    <main>

        <?php $all = Group::all(); ?>
        <table class="table container">
            <thead>
                <tr>

                    <th>Id</th>
                    <th>Creation</th>
                    <th>Modification</th>
                    <th>Titre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($all as $a) : ?>
                    <tr>
                        <td><?= $a->getId() ?></td>
                        <td><?= $a->getCreated_at() ?></td>
                        <td><?= $a->getModified_at() ?></td>
                        <td>
                            <a href="./oneGroup.php?id=<?= $a->getId() ?>">
                                <?= $a->getTitle() ?>
                            </a>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top pt-4">Ajouter un groupe</h1>
            <p>
                <input type="text" placeholder="Votre titre" name="title" class="form-control">
            </p>
            <button type="submit" name="addGroup" class="btn btn-primary">Valider</button>

        </form>

    </main>

    <?php include("partials/footer.php") ?>
</body>

</html>