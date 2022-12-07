<?php
    require_once("cont_compte.php");
    require_once("vue_compte.php");
    require_once("modele_compte.php");

    class mod_comptel{
        private $controleur;
        
        
        function __construct() {
            $this->controleur = new cont_accueil(new modele_accueil(), new vue_accueil());
        }

        
        public function exec(){
            $this->controleur->exec();
        }

    }

?>