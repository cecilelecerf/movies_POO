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
        <?php $all = Movie::all();
        ?>
        <table class="table container table-hover">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>IMDB</th>
                    <th>Catégorie</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($all as $a) :  ?>
                    <tr onClick="document.location.href='oneMovie.php?id=<?= $a->getId() ?>'">
                        <td><?= $a->getTitle() ?> </td>
                        <td><?= $a->getIMDB() ?></td>
                        <td><?= $a->getGender()->getName() ?></td>

                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </main>

    <?php include("partials/footer.php") ?>
</body>

</html>