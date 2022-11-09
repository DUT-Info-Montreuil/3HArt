<?php
require_once("modele_accueil.php");
require_once("vue_accueil.php");



    class cont_accueil{
        private $modele;
        private $vue;
        private $action;

        function __construct($modele, $vue){
            $this->modele = $modele;
            $this->vue = $vue;

            if (isset($_GET["action"])){
                $this-> action = $_GET["action"];
            }
            else{
                $this-> action = "bienvenue";
            }

        }

        public function liste(){
            $this->vue->afficheListe($this->modele->getListe());
        }

        public function details($id){
            $this->vue->afficheDetails($this->modele->getDetails($id));
        }

        public function afficher($texte){
            $this->vue->afficher($texte);
        }

        

        function exec(){
<<<<<<< HEAD
            
=======
            $this->vue->menu();
            echo "<br>";
            echo $this->action;
>>>>>>> ad365fee47195599db5612b19522673ecd371e79
            switch($this->action) { 
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
					
				case "ajout";
                    $this->modele->ajout($_GET["login"],$_GET["password"]);
                    break;

                case "maChaine";
                    if($this->modele->estConnecter()){
                        $this->vue->maChaine(TRUE);
                    }
                    else{
                        $this->vue->menu();
                        echo "<br>";
                        $this->vue->pasConnecter();
                    }
                    break;

                case "commenter";
                    $this->vue->commenter();
                    break;

                case "posterCommentaire";
                    $this->modele->posterCommentaire($_POST["commentaire"]);
                    $this->vue->maChaine(TRUE);
                    break;

                case "lireCommentaire";
                    $this->vue->maChaine(FALSE);
                    $commentaire = $this->modele->lireCommentaire();
                    if($commentaire != -1){
                        $this->vue->afficherCommentaires($commentaire);
                    }
                    else{
                        $this->vue->afficher("Pas de commentaire à afficher :)");
                    }
                    echo "<br>";
                    $this->vue->afficheVosImage();
                    break;

                case "ajoutImage";
                    $this->vue->image();
                    break;

                case "supprimerImage";
                    $this->vue->formulaireSuppression();
                    break;

                case "suppression";
<<<<<<< HEAD
                    $this->vue->afficher($this->modele->suppression($_POST["id"]));
=======
<<<<<<< HEAD
                    echo "test";
=======
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
                    $this->modele->suppression($_POST["id"]);
>>>>>>> ad365fee47195599db5612b19522673ecd371e79
                    break;


                case "uploadImage";
                    $this->vue->afficher($this->modele->upload());
                    break;

                default:
                    echo "erreur : " . $this->action;
                    break;
                
            }
        }
        
    }
?>