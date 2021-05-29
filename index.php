<?php

//si le $_GET est vide, on affiche la page accueil
if(empty($_GET['page'])){
    require "views/accueilView.php";
}
//sinon, on verifie la valeur du $_GET
else {
    switch($_GET['page']){
        case "accueil" : require "views/accueilView.php";
        break;
        case "livres": require "views/livresView.php";
        break;
    }
}
