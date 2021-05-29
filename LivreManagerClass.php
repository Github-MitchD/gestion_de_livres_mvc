<?php
require_once "modelClass.php";
require_once "LivreClass.php";

class LivreManager extends Model {
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

    /**
     * Fonction qui permet de faire une requete en bdd pour recuperer tous les livres
     */
    public function chargementLivres(){
        //on prepare la requete en se connectant a la bdd
        $req = $this->getBdd()->prepare("SELECT * FROM livres ORDER BY id DESC");
        $req->execute();
        // $data = $req->fetchAll();
        //FETCH_ASSOC evite les doublons
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        // echo"<pre>";
        // print_r($data);
        // echo"</pre>";

        //on termine la requete
        $req->closeCursor();
        
        //on parcours le tableau $data (contenant toutes les données de la bdd) pour generer les livres
        foreach($data as $livre){
            $l = new Livre($livre['id'], $livre['titre'], $livre['auteur'], $livre['image']);
            //on ajoute dans le tableau de livres ($livres) chaque livre généré grace a la fonction ajoutLivre()
            $this->ajoutLivre($l);
        }
    }
}