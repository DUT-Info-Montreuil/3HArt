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
            $idImage = $this->modele->cheminImage($idImage);
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
						$this->vue->accueil();
						$this->afficheImage($_GET['nom']);
                        $this->vue->afficherTelechargement($_GET['nom']);
						$this->vue->commenter($_GET['nom']); // formulaire commentaire
						$this->vue->espacer();
						if(isset($_POST['commentaire']) && $_POST['commentaire'] != "" ){
							session_start();
							$this->modele->enregistrerCommentaire($_GET['nom'], $_SESSION['login'], $_POST['commentaire'] ); 
							header("Location: index.php?module=image&nom=$_GET[nom]&action=image"); /* Pour que les données ne soit pas conservé
							lors d'un rafraichissement de la page et que les commentaires dédoublent */
						}
						$commentaire = $this->modele->lireCommentaires($_GET['nom']);
						if($commentaire != -1){
							$this->vue->afficherCommentaires($commentaire);
						}
						else{
							$this->vue->afficher("Pas de commentaire a afficher :(");
						}
						echo "<br>";
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