<?php
require_once("modele_accueil.php");
require_once("vue_accueil.php");



    class cont_accueil{
        private $modele;
        private $vue;

        function __construct($modele, $vue){
            $this->modele = $modele;
            $this->vue = $vue;
        }
         
        function exec(){
            echo ($this->vue->menu());
            if (isset($_GET['action'])) {
                switch($_GET['action']) { 
                    case "bienvenue":
                        $this->vue->menu();
                        echo "<br>";
                        break;

                    case "inscription":
                        $this->vue->formulaireInscription();
                        break;

                    case "connexion";
                        $this->vue->menu();
                        echo "<br>";
                        $this->vue->afficher($this->modele->connexion());
                        break;
                    
                    case "deconnexion";
                        $this->vue->menu();
                        echo "<br>";
                        $this->vue->afficher($this->modele->deconnexion());
                        break;
                        

                    default:
                        echo "erreur : " . $this->action;
                        break;
                }    
            }
        }
        
    }
?>