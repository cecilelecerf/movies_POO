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
        <?php $all = Character::all();
        ?>
        <table class="table container table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Film</th>
                    <th>Genre</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($all as $a) :  ?>
                    <tr onClick="document.location.href='oneCharacter.php?id=<?= $a->getId() ?>'">
                        <td><?= $a->getName() ?> </td>
                        <td><a href="oneMovie.php?id=<?= $a->getMovie_id() ?>"><?= $a->getMovie()->getTitle() ?></a></td>
                        <td><a href="oneGender.php?id=<?= $a->getMovie()->getGender_id() ?>">
                                <?= $a->getMovie()->getGender()->getName() ?>
                            </a></td>

                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top py-4">Ajouter un personnage</h1>
            <p>
                <input type="text" placeholder="Nom du personnage" name="name" class="form-control">
            </p>
            <select class="form-select mb-3" aria-label="Default select example" name="movie_id">
                <option selected>Sélectionner un film</option>
                <?php $all = Movie::all();
                foreach ($all as $a) :
                ?> <option value="<?= $a->getId() ?>"><?= $a->getTitle() ?></option>
                <?php endforeach ?>
            </select>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="addCharacter">Valider</button>
            </div>
        </form>
    </main>

    <?php include("partials/footer.php") ?>
</body>

</html>