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

        public function afficheImage() {
            $idImage = "./modules/mod_image/photo.png";
            if (isset($idImage)) {
                $this->vue->afficherImage($idImage);
            }

//            if (isset($_FILES['photo']['tmp_name'])) {  
//                $taille = getimagesize($_FILES['photo']['tmp_name']);
//                $largeur = $taille[0];
//                $hauteur = $taille[1];
//                $largeur_miniature = 300;
//                $hauteur_miniature = $hauteur / $largeur * $largeur_miniature;
//                $im = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
//                $im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
//                imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
//                imagejpeg($im_miniature, 'miniatures/'.$_FILES['photo']['name'], 90);
//                echo '<img src="miniatures/' . $_FILES['photo']['name'] . '">';
//            }
        }
        
        public function details(){
            //$this->vue->afficheDetails($this->modele->getDetails($idImage));
            echo("details images");
        }

        function exec(){
            $this->vue->menu();
            if(isset($_GET['action'])){
            switch($_GET['action']) { 

                case "image" :
                    $this->afficheImage();
                    $this->details();
                    break;

                case "pleinEcran":

                    break;


                default:
                    echo ("erreur : ".$_GET['action']);
                    break;
                
                }
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