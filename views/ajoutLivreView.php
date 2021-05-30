<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>livres/av" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre du livre</label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur du livre</label>
        <input type="text" class="form-control" id="auteur" name="auteur">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php

$content = ob_get_clean();
$titre = "Ajout d'un livre";
require "template.php";
