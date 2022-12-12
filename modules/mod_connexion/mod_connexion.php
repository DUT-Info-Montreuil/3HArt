<?php

require_once('cont_connexion.php');

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