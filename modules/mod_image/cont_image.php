<?php
require_once("modele_image.php");
require_once("vue_image.php");

    class cont_image{
        private $modele;
        private $vue;

        function __construct($modele, $vue){
            $this->modele = $modele;
            $this->vue = $vue;
        }

        public function afficheImage($nomImage,$miniature = false) { //TODO recupérer l'image a la place du chemin
            $image = $this->modele->getImage($nomImage);
            $auteur = $this->modele->getNomUtilisateur($image[0]['IdUtilisateur']);
            if ($miniature) {
                echo ($this->vue->miniature($nomCheminImage));
            }
            else {
                $commentaires = $this->modele->getCommentaire($this->modele->getIdImage($nomImage)[0]["IdImage"]);
				$moyenne = $this->modele->obtenirMoyenne($image); 
				$this->vue->affichage($image,$moyenne,$auteur);
                $this->commentaires($commentaires);
            }
        }

        public function commentaires($commentaires) {
            $commentaire = "";
            for($i = 0; $i <= sizeof($commentaires) -1 ; $i++) {
                $auteur = $this->modele->getNomUtilisateur($commentaires[$i]["IdUtilisateur"])[0]["pseudo"];
                $commentaire = $commentaire.$this->vue->afficherCommentaire($commentaires[$i],$auteur);
            }
            $this->vue->fermerDiv();
        }
    
        public function upload() {
            echo ($this->vue->upload());
            $this->modele->upload();
        }
		
		public function noter() {
            var_dump($_GET['nom']);
            var_dump($this->modele->getIdImage($_GET['nom']));
            return $this->modele->ajouterNote($_POST['note'], $this->modele->getIdImage($_GET['nom'])); 
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
                        $_SESSION['tempsDebut'] = time();
						if(isset($_GET['log'])){
							switch($_GET['log']){
								case -1:
									$this->vue->afficher("La note doit etre un nombre");
									break;
								
								case -2:
									$this->vue->afficher("La note doit etre positive");
									break;
									
								case -3:
									$this->vue->afficher("La note ne peut pas etre superieur a 10 "); 
									break;
								
								default:
									echo ("erreur : ".$_GET['log']);
									break;
							}
						}
                        break;
                    case "commenter":
                        if(isset($_POST['commentaire']) && $_POST['commentaire'] != "" ) {
							$this->modele->postCommentaire($_SESSION['login'], $_GET['nom'], $_POST['commentaire'] ); 
                            var_dump($_GET['nom']);
							header("Location: index.php?module=image&nom=".$_GET["nom"]."&action=image"); /* Pour que les données ne soit pas conservé
							lors d'un rafraichissement de la page et que les commentaires dédoublent */
						}
						break;
                    case "upload":
                        $this->upload();
                        break;
						
					case "noter":
						$test = $this->noter();
						if($test < 0){
							header("Location: index.php?module=image&nom=".$_GET["nom"]."&action=image&log=$test");
						}
						else{
							header("Location: index.php?module=image&nom=".$_GET["nom"]."&action=image");
						}
						break;
						

                    case "telechargement":
                        $this->modele->telechargement($_GET['urlFichier']);
                        break;

                    
                    default:
                        echo ("erreur : ".$_GET['action']);
                        break;
                
                }
            }
            else {
                
                if(isset($_SESSION['tempsDebut'])){
                    $t1 = time();
                    $tFinal = $t1 - $_SESSION['tempsDebut'];
                    $this->vue->afficherTemps($this->modele->calculerTemps($tFinal));
                    unset($_SESSION['tempsDebut']);
                }
                // $this->afficherImages($this->modele->getImages());
                
                
                
            }
        }         
    }
?>