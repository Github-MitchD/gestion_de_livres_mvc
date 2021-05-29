<?php
class Livre {

    // LES ATTRIBUTS
    private $id;
    private $titre;
    private $auteur;
    private $image;

    // LE CONSTRUCTEUR
    public function __construct($id, $titre, $auteur, $image){
        //$this->id fait ref a l'attribut, $id fait ref au parametre de la fonction
        $this->id = $id;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->image = $image;
    }

    // GETTER/SETTER
    public function getId(){ return $this->id; }
    public function setId($id){ return $this->id = $id; }

    public function getTitre(){ return $this->titre; }
    public function setTitre($titre){ return $this->titre = $titre; }

    public function getAuteur(){ return $this->auteur; }
    public function setAuteur($auteur){ return $this->auteur = $auteur; }

    public function getImage(){ return $this->image; }
    public function setImage($image){ return $this->image = $image; }
}
