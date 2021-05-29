<?php

//on a besoin de la classe LivreManager
require_once "models/LivreManagerClass.php";

class LivresController{
    private $livreManager;

    public function __construct(){        

        //on crée un nouvel objet LivreManager
        $this->livreManager = new LivreManager;

        //on recupere tous les livres de la bdd grace a la fonction chargementLivres() du LivreManager
        $this->livreManager->chargementLivres();        
    }

    public function afficherLivres(){
        // $livreManager = $this->livreManager;
        //on mets ces livres dans le tableau de livres
        $livres = $this->livreManager->getLivres();
        require "views/livresView.php";
    }
}