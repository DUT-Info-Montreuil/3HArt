<?php
    include_once('vue_decouvrir.php');
    include_once('modele_decouvrir.php');
    //include_once('connexion.php');

    class controleur_decouvrir {
        private $vue;
        private $modele;
        

        public function __construct(){
            $this->vue = new vue_decouvrir();
            $this->modele = new modele_decouvrir();
             
        }
        
        
        function liste() {
            $this->vue->affiche_liste($this->modele->getListe());
        }

        public function detailsUsers() {
            $this->vue->affiche_details($this->modele->getDetails($_GET['id']));
        }
        


        public function search(){
            return $this->modele->search();
        }
        public function categorie(){

            switch ($_GET['categorie']) {
                case '3d':
                    $this->modele->categorie("3d");
                    break;
                case 'paysage':
                    break;
                case 'dessin':
                    break;
                case 'noirblanc':
                    break;
                
                default:
                    break;
            }
        }

        public function exec(){
            $this->vue->menu();
            echo "<br>";
            if (isset($_GET['action'])){
                switch($_GET['action']) { 
                    case "inscription":
                        $this->vue->formulaireInscription();
                        break;
    
                    case "connexion";
                        $this->modele->connexion();
                        break;
                    
                    case "deconnexion";
                        $this->modele->deconnexion();
                        break;
                        
                    case "search";
                        $this->modele->search();
    
                    default:
                        echo "erreur : " . $this->action;
                        break;
                    
                }
            }
            
        }    
    }
?>
