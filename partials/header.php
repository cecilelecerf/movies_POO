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
                Tous les genres
            </a>
        </li>
        <li class="nav-item">
            <a href="allMovies.php" <?= ($last == "allMovies.php") ?
                                        'class=' . $className . ' active"' :
                                        'class=' . $className . '"';
                                    ?>>
                Tous les films
            </a>
        </li>
        <li class="nav-item">
            <a href="allCharacters.php" <?= ($last == "allCharacters.php") ?
                                            'class=' . $className . ' active"' :
                                            'class=' . $className . '"';
                                        ?>>
                Tous les personnages
            </a>
        </li>
        <li class="nav-item">
            <a href="addMovie.php" <?= ($last == "addMovie.php") ?
                                        'class= "btn btn-light"' :
                                        'class= "btn btn-primary""';
                                    ?>>
                Ajouter un film
            </a>
        </li>

    </ul>
</nav>


<?php flash_out() ?>