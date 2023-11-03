<?php
$filepath = $_SERVER['PHP_SELF'];
$tFilepath = explode('/', $filepath);

$last = array_pop($tFilepath);
?>
<nav class="navbar bg-dark mb-4 border-body px-auto position-ficked-top-0" data-bs-theme="dark">
    <ul class="navbar-nav container flex-row">
        <li class="nav-item">
            <?php $className = '"nav-link'; ?>
            <a href="index.php" <?= ($last == "index.php") ?
                                    'class=' . $className . ' active"' :
                                    'class=' . $className . '"';
                                ?>>
                Tous les groupes
            </a>
        </li>
        <li class="nav-item">
            <a href="allStudents.php" <?= ($last == "allStudents.php") ?
                                            'class=' . $className . ' active"' :
                                            'class=' . $className . '"';
                                        ?>>
                Tous les étudiants
            </a>
        </li>
        <li>
            <a href="oneGroup.php?id=2" <?= ($last == "oneGroup.php?id=2") ?
                                            'class=' . $className . ' active"' :
                                            'class=' . $className . '"';
                                        ?>>
                Premier groupe
            </a>
        </li>
    </ul>
</nav>

<?php flash_out() ?>