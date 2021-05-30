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

    /**
     * Fonction qui permet de recuperer un livre en fonction de son id
     * @param $id
     * @return $this->livres[$i]
     */
    public function getLivreById($id){
        //on parcours le tableau de livres
        for($i = 0; $i < count($this->livres); $i++){
            //on verifie si l'id du livre qu'on parcours est le meme que $id en param de la fonction
            if($this->livres[$i]->getId() === $id){
                return $this->livres[$i];
            }
        }
    }

    /**
     * Fonctions qui permet d'ajouter un livre dans la base de données
     * @param $titre, $auteur, $image
     */
    public function ajoutLivreBdd($titre, $auteur, $image){
        $req = "INSERT INTO livres (titre, auteur, image) values (:titre, :auteur, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue("titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue("auteur", $auteur, PDO::PARAM_STR);
        $stmt->bindValue("image", $image, PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        //si la requete s'est bien deroulé, on ajoute le nouveau livre dans le tableau de livres ($livres)
        if($resultat > 0){
            //on instancie un nouveau Livre
            $livre = new Livre($this->getBdd()->lastInsertId(), $titre, $auteur, $image);
            //on l'ajoute dans le tableau livres
            $this->ajoutLivre($livre);
        }
    }

    /**
     * Fonction qu permet de supprimer un livre de la base de données en fonction de son id
     * @param $id
     */
    public function suppressionLivreBdd($id){
        $req = "DELETE from livres WHERE id = :idLivre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);
        
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        //si la requete s'est bien déroulé, on met a jour le tableau de livres ($livres)
        if($resultat > 0){
            $livre = $this->getLivreById($id);
            unset($livre);
        }
    }
}