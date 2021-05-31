<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>livres/mv" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre du livre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre->getTitre(); ?>">
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur du livre</label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $livre->getAuteur(); ?>">
    </div>

    <h3>Image :</h3>
    <img src="<?= URL ?>public/img/<?= $livre->getImage(); ?>" width="150px">

    <div class="mb-3">
        <label for="image" class="form-label">Changer l'image du livre</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $livre->getId(); ?>">
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php

$content = ob_get_clean();
$titre = "Modifier un livre";
require "template.php";
