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

        public function afficheImage($nomImage,$miniature = false) {
            $nomCheminImage = $this->modele->cheminImage($nomImage);
            if ($miniature) {
                echo ($this->vue->miniature($nomCheminImage));
            }
            else {
                $commentaires = $this->modele->getCommentaire($this->modele->getIdImage($nomImage)[0]["IdImage"]);
                $vueCommentaires = $this->commentaires($commentaires);
                echo ($this->vue->affichage($nomCheminImage,$vueCommentaires));
            }
        }

        public function commentaires($commentaires) {
            $commentaire = "";
            for($i = 0; $i <= sizeof($commentaires) -1 ; $i++) {
                $auteur = $this->modele->getNomUtilisateur($commentaires[$i]["IdUtilisateur"])[0]["pseudo"];
                $commentaire = $commentaire.$this->vue->afficherCommentaire($commentaires[$i],$auteur);
            }
            return $commentaire;
        }
		/*
		public function afficherImages($images){
            for($i = 0; $i <= sizeof($images) -1 ; $i++){
				$nom = $images[$i];
                $this->vue->afficher("<a id = images href = \"index.php?module=image&nom=$nom&action=image\" >");
                $this->afficheImage($nom,true);
                echo '</a>';
				$this->vue->espacer();
			}
        }
*/
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
                    case "commenter":
                        if(isset($_POST['commentaire']) && $_POST['commentaire'] != "" ) {
							$this->modele->postCommentaire($_SESSION['login'], $_GET['nom'], $_POST['commentaire'] ); 
							header("Location: index.php?module=image&nom=".$_GET["nom"]."&action=image"); /* Pour que les données ne soit pas conservé
							lors d'un rafraichissement de la page et que les commentaires dédoublent */
						}
                        /*$commentaire = $this->modele->lireCommentaires($_GET['nom']);
						if($commentaire != -1){
							$this->vue->afficherCommentaires($commentaire);
						}
						else{
							$this->vue->afficher("Pas de commentaire a afficher :(");
						}*/
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