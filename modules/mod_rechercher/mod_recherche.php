<?php
    require_once("cont_rechercher.php");

    class mod_rechercher {

        private $controleur;
            
        function __construct(){
            $this->controleur = new cont_rechercher();
        }
        
        public function exec(){
            $this->controleur->exec();
        }

    }
?>