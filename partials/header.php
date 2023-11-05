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
            <a href="allMovies.php" <?= ($last == "allMovies.php") ?
                                        'class=' . $className . ' active"' :
                                        'class=' . $className . '"';
                                    ?>>
                Tous les films
            </a>
        </li>

        <li class="nav-item">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMovie">
                Ajouter un film
            </button>
            <!-- Modal -->
            <div class="modal fade" id="addMovie" tabindex="-1" aria-labelledby="addMovie" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addMovie">Ajouter un film</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                            <div class="modal-body">

                                <p>
                                    <input type="text" placeholder="Titre du film" name="title" class="form-control">
                                </p>
                                <p>
                                    <input type="text" placeholder="Numéro IMDB" name="imdb" class="form-control">
                                </p>
                                <select class="form-select" aria-label="Default select example" name="gender_id">
                                    <option selected>Sélectionner le genre</option>

                                    <?php $all = Gender::all();
                                    foreach ($all as $a) :
                                    ?>
                                        <option value="<?= $a->getId() ?>"><?= $a->getName() ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addMovie">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>


<?php flash_out() ?>