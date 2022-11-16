<?php

include_once('cont_connexion.php');
include_once('modele_connexion.php');
include_once('Connexion.php');

Connexion::initConnexion();


    class mod_connexion {

        private $controleur;
               
        function __construct(){
            $this->controleur = new controleur_connexion();
        }
        
        public function exec(){
            $this->controleur->exec();
        
        }
        
    }
?>