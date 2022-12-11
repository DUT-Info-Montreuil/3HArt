<?php

    require_once("vue_rechercher.php");
    require_once("modele_rechercher.php");

    class cont_rechercher {
        private $modele;
        private $vue;

        public function __construct() {
            $this->vue = new vue_rechercher();
            $this->modele = new modele_rechercher(); 
        }

        public function exec() {
            $this->vue->afficherResultat($this->modele->rechercher());
        }
    }

?>