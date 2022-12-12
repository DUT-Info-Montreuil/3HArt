<?php
    include_once('modules/mod_connexion/vue_connexion.php');
    include_once('modules/mod_connexion/modele_connexion.php');
    include_once('Connexion.php');

    class controleur_connexion extends Connexion{
        
        private $vue;
        private $modele;

        public function __construct(){
            $this->vue = new vue_connexion();
            $this->modele = new modele_connexion();
        }

        public function menu() {
            $this->vue->menu();
        }

        public function addInscription() {
            $this->vue->form_inscription();
        }
        public function inscription() {
            $this->modele->inscription();
            $this->vue->resultat_inscription();
        }
        
        public function form_connexion() {
            $this->vue->form_connexion();
        }

        public function connecter(){
            $this->modele->connexion();
            $this->vue->resultat_connexion();

        }
        public function deconnexion() {
            echo($this->vue->resultat_deconnexion($this->modele->deconnexion()));
        }
        public function getVue() {
            return $this->vue;
        }
        public function exec() {
            if(isset($_GET['action'])){
                switch($_GET['action']) {
                    case "inscription": 
                        $this->addInscription();
                        break;
                    case "inscrire": 
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