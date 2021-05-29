<?php ob_start(); ?>

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
        <tr class="table-light">
            <th scope="row" class="align-middle">#1</th>
            <td class="align-middle"><img src="public/img/livre1.jpg" width="70px"></td>
            <td class="align-middle">Et que ne durent que les moments doux</td>
            <td class="align-middle">Virginie Grimaldi</td>
            <td width=250 class="align-middle"><a href="#link" type="button" class="btn btn-outline-info">Voir</a>
                <a href="#link" type="button" class="btn btn-outline-warning">Modifier</a>
                <a href="#link" type="button" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
        <tr class="table-light">
            <th scope="row" class="align-middle">#2</th>
            <td class="align-middle"><img src="public/img/livre2.jpg" width="70px"></td>
            <td class="align-middle">Changer l'eau des fleurs</td>
            <td class="align-middle">Valérie Perrin</td>
            <td width=250 class="align-middle"><a href="#link" type="button" class="btn btn-outline-info">Voir</a>
                <a href="#link" type="button" class="btn btn-outline-warning">Modifier</a>
                <a href="#link" type="button" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
        <tr class="table-light">
            <th scope="row" class="align-middle">#3</th>
            <td class="align-middle"><img src="public/img/livre3.jpg" width="70px"></td>
            <td class="align-middle">Le Chant d'Achille</td>
            <td class="align-middle">Madeline Miller</td>
            <td width=250 class="align-middle"><a href="#link" type="button" class="btn btn-outline-info">Voir</a>
                <a href="#link" type="button" class="btn btn-outline-warning">Modifier</a>
                <a href="#link" type="button" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
        <tr class="table-light">
            <th scope="row" class="align-middle">#4</th>
            <td class="align-middle"><img src="public/img/livre4.jpg" width="70px"></td>
            <td class="align-middle">Jujutsu Kaisen</td>
            <td class="align-middle">Gege Akutami</td>
            <td width=250 class="align-middle"><a href="#link" type="button" class="btn btn-outline-info">Voir</a>
                <a href="#link" type="button" class="btn btn-outline-warning">Modifier</a>
                <a href="#link" type="button" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
        <tr class="table-light">
            <th scope="row" class="align-middle">#5</th>
            <td class="align-middle"><img src="public/img/livre5.jpg" width="70px"></td>
            <td class="align-middle">Il etait deux fois</td>
            <td class="align-middle">Franck Thilliez</td>
            <td width=250 class="align-middle"><a href="#link" type="button" class="btn btn-outline-info">Voir</a>
                <a href="#link" type="button" class="btn btn-outline-warning">Modifier</a>
                <a href="#link" type="button" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
    </tbody>
</table>

<?php

$content = ob_get_clean();
$titre = "Les livres de la bibliotheque";
require "template.php";
