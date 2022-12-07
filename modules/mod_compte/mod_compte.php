<?php
    require_once("cont_compte.php");
    require_once("vue_compte.php");
    require_once("modele_compte.php");

    class mod_compte {
        private $controleur;
        
        
        function __construct() {
            $this->controleur = new cont_compte(new modele_compte(), new vue_compte());
        }

        
        public function exec(){
            $this->controleur->exec();
        }

    }

?>