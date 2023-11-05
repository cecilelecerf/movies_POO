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

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top pt-4">Ajouter un étudiant</h1>
            <div class="d-flex">
                <p class="w-50 pe-2">
                    <input type="text" placeholder="Prénom" name="firstname" class="form-control">
                </p>

                <p class="w-50 ps-2">
                    <input type="text" placeholder="Nom de famille" name="lastname" class="form-control">
                </p>
            </div>
            <p>
                <input type="date" placeholder="Votre Anniversaire" name="birthday" class="form-control">
            </p>
            <p>
                <input type="text" placeholder="Spécialité" name="major" class="form-control">
            </p>
            <button type="submit" name="addStudent" class="btn btn-primary">Valider</button>

        </form>

    </main>

    <?php include("partials/footer.php") ?>
</body>

</html>