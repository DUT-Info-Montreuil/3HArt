<?php
require_once("modele_image.php");
require_once("vue_image.php");

    class cont_image{
        private $modele;
        private $vue;
        private $idImage;

        function __construct($modele, $vue){
            $this->modele = $modele;
            $this->vue = $vue;
        }

        public function afficheImage($idImage,$miniature = false) {
            $idImage = "./modules/mod_image/$idImage";
            if ($miniature)
                echo ($this->vue->miniature($idImage));
            else
                echo ($this->vue->affichage($idImage));
        }

        public function details(){
            //$this->vue->afficheDetails($this->modele->getDetails($idImage));
            echo("details images");
        }

        function exec(){
            if(isset($_GET['action'])){
                switch($_GET['action']) { 

                    case "image" :
                        $this->afficheImage($_GET['nom']);
                        break;

                    case "pleinEcran":

                        break;

                    
                    default:
                        echo ("erreur : ".$_GET['action']);
                        break;
                
                }
            }
            else {
                //$this->vue->menu();
                $nom = $_GET['nom'];
                echo "<a href = \"index.php?module=image&nom=$nom&action=image\" >";
                $this->afficheImage($nom,true);
                echo '</a>';
            }
        } 
		
			
		
		public function connexion(){
            $this->modele->connexion;
		}
		
		public function deconnexion(){
			$this->modele->deconnexion;
		}
        
    }
?>