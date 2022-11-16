<?php
    include_once('modules/mod_connexion/vue_connexion.php');
    include_once('modules/mod_connexion/modele_connexion.php');
    include_once('Connexion.php');

    class controleur_connexion extends Connexion{
        private $vue;
        private $modele;
        // private $action;

        public function __construct(){
            $this->vue = new vue_connexion();
            $this->modele = new modele_connexion();
            //$this->action = isset($_GET['action']) ? $_GET['action'] : "";  
        }

        public function menu() {
            $this->vue->menu();
        }

        // public function get_action() {
        //     return $this->action;
        // }
        // public function ajout() {
        //     $this->vue->form_ajout();
        // }
        public function addInscription() {
            $this->vue->form_inscription();
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
            // echo $this->get_action();
            if(isset($_GET['action'])){
                switch($_GET['action']) {
                    case "addInscription": 
                        $this->addInscription();
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
            }
            else {
            global $affichage;
            $affichage=$this->vue->getAffichage();      
            }  
        }


    }
?>