<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: allStudents.php");
    exit();
}
$oneStudent = new Student($_GET["id"]);
if (empty($oneStudent->getId())) {
    header("Location: allStudents.php");
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

            <h1><?= $oneStudent->getName(); ?></h1>
            <p>Anniversaire le : <?= date_format(date_create($oneStudent->getBirthday()), "j F, Y"); ?></p>

            <?php if (!empty($oneStudent->getPromo())) : ?>
                <p>Promo : <?= $oneStudent->getPromo()->getTitle() ?></p>
            <?php endif ?>
            <?php if (!empty($oneStudent->getMajor())) : ?>
                <p>Spécialité : <?= $oneStudent->getMajor() ?></p>
            <?php endif ?>
            <p>Création le : <?= $oneStudent->getCreated_at() ?></p>
            <p>Modification le : <?= $oneStudent->getModified_at() ?></p>
            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                <input type="hidden" name="id" value="<?= $oneStudent->getId() ?>">
                <button type="submit"><i class="bi bi-x-circle"></i></button>
            </form>
        </article>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="container my-5">
            <h1 class="border-top pt-4">Modfier <?= $oneStudent->getFirstname(); ?> </h1>

            <p>
                <input type="hidden" placeholder="Prénom" name="id" class="form-control" value="<?= $oneStudent->getId() ?>">
            </p>
            <div class="d-flex ">

                <p class="w-50 pe-2">
                    <input type="text" placeholder="Prénom" name="firstname" class="form-control" value="<?= $oneStudent->getFirstname() ?>">
                </p>

                <p class="w-50 ps-2">
                    <input type="text" placeholder="Nom de famille" name="lastname" class="form-control" value="<?= $oneStudent->getLastname() ?>">
                </p>
            </div>
            <p>
                <input type="text" placeholder="Spécialité" name="major" class="form-control" value="<?= $oneStudent->getMajor() ?>">
            </p>
            <p>
                <input type="date" placeholder="Votre Anniversaire" name="birthday" class="form-control" value="<?= $oneStudent->getBirthday() ?>">
            </p>
            <button type="submit" name="updateStudent" class="btn btn-primary">Valider</button>

        </form>
    </main>


</body>

</html>