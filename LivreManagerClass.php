<?php

class LivreManager {
    //on definit le tableau de livres
    private $livres;

    /**
     * Fonction qui permet d'ajouter un livre
     * @param $livre
     */
    public function ajoutLivre($livre){
        //on ajoute le livre qui est en param de la fonction dans le tableau $livres
        $this->livres[] = $livre;
    }

    /**
     * Fonction qui permet de recuperer le tableau de livres
     * @return $this->livres
     */
    public function getLivres(){
        return $this->livres;
    }
}