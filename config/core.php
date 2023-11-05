<?php
if (!empty($_POST)) {
    if (isset($_POST["addGender"])) {
        $_POST = array_map("trim", $_POST);
        $new = new Gender($_POST);
        if ($new->isValid()) {
            $new->save();
            flash_in("success", "Le genre est enregistré");
        }
        header("Location: index.php");
        exit();
    }

    if (isset($_POST["addMovie"])) {
        $_POST = array_map("trim", $_POST);
        $new = new Movie($_POST);
        if ($new->isValid()) {
            $new->save();
            flash_in("success", "Le film est enregistré");
        }
        header("Location: allMovies.php");
        exit();
    }
    if (isset($_POST["updateStudent"])) {
        $_POST = array_map("trim", $_POST);
        $update = new Gender($_POST);
        if ($update->isValid()) {
            $update->save();
            flash_in("success", "L'élève est modifié(e)");
        }
        header("Location: oneStudent.php?id=" . $_GET["id"]);
        exit();
    }

    if (isset($_POST["deleteStudent"])) {
        $delete = new Movie($_POST);
        if ($delete->delete())
            flash_in("succes", "L'élève est supprimé(e)");
        else
            flash_in("danger", "L'élève n'a pas été supprimé(e)");
        header("Location: oneStudent.php?id=" . $_GET["id"]);
        exit();
    }
}
