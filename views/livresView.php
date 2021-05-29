<?php

ob_start(); ?>

<a href="#link" type="button" class="btn btn-info mb-4">Ajouter un livre</a>

<table class="table table-hover">
    <thead>
        <tr class="table-info">
            <th scope="col">#id</th>
            <th scope="col">Image</th>
            <th scope="col">Titre du livre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php for($i = 0; $i < count($livres); $i++) : ?>

            <tr class="table-light">
                <th scope="row" class="align-middle">#<?= $livres[$i]->getId(); ?></th>
                <td class="align-middle"><img src="public/img/<?= $livres[$i]->getImage(); ?>" width="70px"></td>
                <td class="align-middle"><?= $livres[$i]->getTitre(); ?></td>
                <td class="align-middle"><?= $livres[$i]->getAuteur(); ?></td>
                <td width=250 class="align-middle"><a href="#link" type="button" class="btn btn-outline-info">Voir</a>
                    <a href="#link" type="button" class="btn btn-outline-warning">Modifier</a>
                    <a href="#link" type="button" class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>

        <?php endfor; ?>
        
    </tbody>
</table>

<?php
$content = ob_get_clean();
$titre = "Les livres de la bibliotheque";
require "template.php";