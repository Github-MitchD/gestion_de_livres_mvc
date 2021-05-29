<?php ob_start(); ?>

<p>Ici le contenu de la page d'accueil</p>

<?php

$content = ob_get_clean();
$titre = "Bibliotheque";
require "template.php";