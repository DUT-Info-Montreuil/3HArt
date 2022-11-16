<?php

include_once('cont_connexion.php');
include_once('Connexion.php');

Connexion::initConnexion();


    class mod_connexion {

        private $controleur;
               
        function __construct(){
<<<<<<< HEAD
            $this->controleur = new controleur_connexion();
=======
            $vue = new vue_connexion();
            $modele = new modele_connexion();
            $this->controleur = new controleur_connexion($modele, $vue);
            // $this->controleur = new controleur_connexion();

>>>>>>> 3ef600993bffe16a9fd79eb5e6320350701112ed
        }
        
        public function exec(){
            $this->controleur->exec();
        
        }
        
    }
?>