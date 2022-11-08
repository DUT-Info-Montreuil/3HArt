<?php
    include_once('modules/mod_connexion/vue_connexion.php');
    include_once('modules/mod_connexion/modele_connexion.php');
    include_once('connexion.php');

    class ControleurConnexion extends Connexion{
        private $vue;
        private $modele;
        private $action;

        public function __construct(){
            $this->vue = new VueConnexion();
            $this->modele = new ModeleConnexion();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "";  
        }

        public function menu() {
            $this->vue->menu();
        }
        function bienvenue() {
            $this->vue->bienvenue();
        }
        public function get_action() {
            return $this->action;
        }
        public function ajout() {
            $this->vue->form_ajout();
        }
        public function inscription() {
            $this->modele->inscription();
        }
        public function form_connexion() {
            $this->vue->form_connexion();
        }

        public function connecter(){
            $this->modele->connexion();
            $this->vue->resultat_connexion();

        }
        public function deconnexion() {
            $this->modele->deconnexion();
            $this->vue->resultat_deconnexion();
        }
        public function getVue() {
            return $this->vue;
        }
        public function exec() {
            switch($this->get_action()) {
                case "ajout": 
                    $this->ajout();
                    break;
                case "inscription": 
                    $this->inscription();
                    break;
                case "connexion" :
                    $this->form_connexion();
                    break;
                case "connecter" :
                    $this->connecter();
                    break;
                case "deconnexion" :
                    $this->deconnexion();
            }
            global $affichage;
            $affichage=$this->vue->getAffichage();        }
    }
?>