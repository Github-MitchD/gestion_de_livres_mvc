<?php ob_start(); ?>

<div class="row">
    <div class="col-md-6">
        <img src="<?= URL ?>public/img/<?= $livre->getImage(); ?>">
    </div>
    <div class="col-6">
        <p>Id: <?= $livre->getId(); ?></p>
        <p>Titre: <?= $livre->getTitre(); ?></p>
        <p>Auteur: <?= $livre->getAuteur(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $livre->getTitre();
require "template.php";
