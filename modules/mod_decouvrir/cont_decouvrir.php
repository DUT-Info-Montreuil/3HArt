<?php
    include_once("vue_decouvrir.php");
    include_once("modele_decouvrir.php");
    //include_once('connexion.php');

    class ControleurDecouvrir {
        private $vue;
        private $modele;
        private $action;

        public function __construct(){
            $this->vue = new VueDecouvrir();
            $this->modele = new ModeleDecouvrir();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "bienvenue";  
        }

        public function menu() {
            $this->vue->menu();
        }

        function liste() {
            $this->vue->affiche_liste($this->modele->getListe());
        }

        public function detailsUsers() {
            $this->vue->affiche_details($this->modele->getDetails($_GET['id']));
        }
        public function get_action() {
            return $this->action;
        }

        public function getUsers(){
            
        }
    }
?>
