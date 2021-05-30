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

    /**
     * Permet d'afficher tous les livres
     */
    public function afficherLivres(){
        // $livreManager = $this->livreManager;
        //on mets ces livres dans le tableau de livres
        $livres = $this->livreManager->getLivres();
        require "views/livresView.php";
    }

    /**
     * Fonction qui permet d'afficher un livre grace a son id
     * @param $id
     */
    public function afficherLivre($id){
        $livre = $this->livreManager->getLivreById($id);
        require "views/afficherLivreView.php";
    }

    /**
     * Fonction qui permet d'afficher la vue formulaire d'ajout
     */
    public function createLivre(){
        require "views/ajoutLivreView.php";
    }

    /**
     * Fonction qui permet d'ajouter un livre
     */
    public function ajoutLivreValidation(){
        //on recup les infos de l'image
        $file = $_FILES['image'];
        //info de l'image
        // echo "<pre>";echo print_r($file);echo"</pre>";

        $repertoire = "public/img/";
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);

        //on appel la fonction ajoutLivreBdd() du livreManager
        $this->livreManager->ajoutLivreBdd($_POST['titre'], $_POST['auteur'], $nomImageAjoute);

        header('Location: '. URL . "livres");
    }

    /**
     * Fonction qui permet de gerer l'upload des images
     */
    private function ajoutImage($file, $dir){
        //on verifie qu'une image est renseigné dans le formulaire
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        // on verifie que le dossier $repertoire(public/img) existe, sinon on le crée
        if(!file_exists($dir)) mkdir($dir,0777);

        //on recupere l'extension du fichier
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        //on genere un chiffre aleatoire et on le precede au nom de l'image (evite les doublons)
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];

        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");

        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("Le fichier n'est pas reconnu");

        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");

        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");

        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("L'ajout de l'image n'a pas fonctionné");

        else return ($random."_".$file['name']);
    }

    /**
     * Fonction qui permet de supprimer un livre
     * @param $id
     */
    public function suppressionLivre($id){
        //on recup l'image du livre que l'on souhaite supprimer
        $nomImage = $this->livreManager->getLivreById($id)->getImage();

        //on l'a supprime du repertoire
        unlink("public/img/".$nomImage);
        
        //on appel la fonction suppressionLivreBdd du livreManager
        $this->livreManager->suppressionLivreBdd($id);

        header('Location: ' . URL . "livres");
    }
}