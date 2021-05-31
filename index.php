<?php

//on defini la constante pour le chemin absolu
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/livresController.php";
//on instancie le controller de livre
$livresController = new LivresController;

try {
    //si le $_GET est vide, on affiche la page accueil
    if (empty($_GET['page'])) {
        require "views/accueilView.php";
    }
    //sinon, on verifie la valeur du $_GET en decomposant l'url
    else {
        //filter_var supprime tous les caractères sauf lettres, chiffres et certains caracteres speciaux
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        // echo "<pre>"; print_r($url); echo "</pre>";

        switch ($url[0]) {
                //on test le 1er element ($url[0])
            case "accueil":
                require "views/accueilView.php";
                break;

            case "livres":
                //si on a pas de 2e elements dans l'url (biblio_mvc/livres)
                if (empty($url[1])) {
                    //on appel la fonction afficherLivres() present dans le controller de livre
                    $livresController->afficherLivres();
                }
                //si l'url contient un 2e param
                else if ($url[1] === "read") {
                    $livresController->afficherLivre($url[2]);
                }
                else if ($url[1] === "create") {
                    $livresController->createLivre();
                }
                else if ($url[1] === "update") {
                    $livresController->modificationLivre($url[2]);
                }
                else if ($url[1] === "delete") {
                    $livresController->suppressionLivre($url[2]);
                }
                else if ($url[1] === "av") {
                    $livresController->ajoutLivreValidation();
                }
                else if ($url[1] === "mv") {
                    $livresController->modificationLivreValidation();
                }
                else {
                    throw new Exception("La page n'existe pas !");
                }
                break;
                //si on a rien en param 0
            default:
                throw new Exception("La page n'existe pas !");
        }
    } //fin du else

} //fin du try
catch (Exception $e) {
    echo $e->getMessage();
}
