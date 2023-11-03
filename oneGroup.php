<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$oneGroup = new Group($_GET["id"]);
if (empty($oneGroup->getId())) {
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
    <main>
        <h1><?= $oneGroup->getTitle(); ?> ( <?= $oneGroup->getId(); ?>)</h1>
        <p>Création le : <?= $oneGroup->getCreated_at() ?></p>
        <p>Modification le : <?= $oneGroup->getModified_at() ?></p>
    </main>


</body>

</html>