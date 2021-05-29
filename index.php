<?php

require_once "controllers/livresController.php";
//on instancie le controller de livre
$livresController = new LivresController;

//si le $_GET est vide, on affiche la page accueil
if(empty($_GET['page'])){
    require "views/accueilView.php";
}
//sinon, on verifie la valeur du $_GET
else {
    switch($_GET['page']){
        case "accueil" : require "views/accueilView.php";
        break;
        //on appel la fonction afficherLivres() present dans le controller de livre
        case "livres": $livresController->afficherLivres();
        break;
    }
}
