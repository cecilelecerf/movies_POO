<?php
if (!empty($_POST)) {
    if (isset($_POST["addGroup"])) {
        $_POST = array_map("trim", $_POST);
        $new = new Group($_POST);
        if ($new->isValid()) {
            $new->save();
            flash_in("succes", "La promo est enregistrée");
        }
        header("Location: index.php");
        exit();
    }

    if (isset($_POST["addStudent"])) {
        $_POST = array_map("trim", $_POST);
        $new = new Student($_POST);
        if ($new->isValid()) {
            $new->save();
            flash_in("succes", "L'élève est enregistré(e)");
        }
        header("Location: allStudents.php");
        exit();
    }
    if (isset($_POST["updateStudent"])) {
        $_POST = array_map("trim", $_POST);
        $update = new Student($_POST);
        if ($update->isValid()) {
            $update->save();
            flash_in("succes", "L'élève est modifié(e)");
        }
        header("Location: oneStudent.php?id=" . $_GET["id"]);
        exit();
    }

    if (isset($_POST["deleteStudent"])) {
        $delete = new Student($_POST);
        if ($delete->delete())
            flash_in("succes", "L'élève est supprimé(e)");
        else
            flash_in("danger", "L'élève n'a pas été supprimé(e)");
        header("Location: oneStudent.php?id=" . $_GET["id"]);
        exit();
    }
}
