<?php

ob_start(); ?>

<a href="<?= URL ?>livres/create" type="button" class="btn btn-info mb-4">Ajouter un livre</a>

<table class="table table-hover">
    <thead>
        <tr class="table-info">
            <th scope="col">#id</th>
            <th scope="col">Image</th>
            <th scope="col">Titre du livre</th>
            <th scope="col">Auteur</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php for ($i = 0; $i < count($livres); $i++) : ?>

            <tr class="table-light">
                <th scope="row" class="align-middle">#<?= $livres[$i]->getId(); ?></th>
                <td class="align-middle"><img src="public/img/<?= $livres[$i]->getImage(); ?>" width="70px"></td>
                <td class="align-middle"><?= $livres[$i]->getTitre(); ?></td>
                <td class="align-middle"><?= $livres[$i]->getAuteur(); ?></td>

                <td width=10 class="align-middle">
                    <a href="<?= URL ?>livres/read/<?= $livres[$i]->getId(); ?>" type="button" class="btn btn-outline-info">Voir</a>
                </td>

                <td width=10 class="align-middle">
                    <a href="#link" type="button" class="btn btn-outline-warning">Modifier</a>
                </td>

                <td width=10 class="align-middle">
                    <!-- <a href="#link" type="button" class="btn btn-outline-danger">Supprimer</a> -->
                    <form method="POST" action="<?= URL ?>livres/delete/<?= $livres[$i]->getId(); ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer le livre ?')">
                        <button href="#link" type="submit" class="btn btn-outline-danger">Supprimer</a>
                    </form>
                </td>
            </tr>

        <?php endfor; ?>

    </tbody>
</table>

<?php
$content = ob_get_clean();
$titre = "Les livres de la bibliotheque";
require "template.php";
