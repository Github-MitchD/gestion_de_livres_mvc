<?php

//abstract car on ne souhaite pas que cette class soit instancier directement
//ce seront les class qui heritent de la class Model qui seront instanciées
abstract class Model {
    //attribut 'static' car on veut que ce soit accessible pour les class qui heriteront de la class Model
    private static $pdo;

    //on defini la fonction static pour la focntion de connection à la bdd
    private static function setBdd(){
        //on defini les valeurs de la connetion à la bdd
        self::$pdo = new PDO("mysql:host=localhost; dbname=biblio_mvc; charset=utf-8", "root", "");
        //on defini les élements de parametrage pour $pdo pour gérer les erreurs
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //on appel la connection $pdo
    protected function getBdd(){
        //si on a pas une instance de $pdo, on la créé
        if(self::$pdo === null){
            self::setBdd();
        }
        //si l'instance est déjà crée, on retourne cette meme instance
        return self::$pdo;
    }
}