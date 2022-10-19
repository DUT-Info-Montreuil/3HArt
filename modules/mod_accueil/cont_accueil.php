<?php
require_once("modele_accueil.php");
require_once("vue_accueil.php");

const tabExtensions = ['jpg', 'png', 'jpeg'];
const maxSize = 400000;

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

        

        function exec(){
            $this->vue->menu();
            echo "<br>";
            switch($this->action) { 

                case "bienvenue":
                    $this->bienvenue();
                    break;

                case "inscription":
                    $this->vue->formulaireInscription();
                    break;

                case "connexion";
                    $this->modele->connexion();
                    break;
				
				case "deconnexion";
                    $this->modele->deconnexion();
                    break;
					
				case "ajout";
                    $this->modele->ajout($_GET["login"],$_GET["password"]);
                    break;

                case "ajoutImage";
                    $this->vue->image();
                    break;

                case "image";
                    $tmpName = $_FILES['file']['tmp_name'];
                    $name = $_FILES['file']['name'];
                    $size = $_FILES['file']['size'];
                    $error = $_FILES['file']['error'];

                    $extension = explode('.', $name);
                    $extension = strtolower(end($extension));

                    if(in_array($extension, tabExtensions)){
                        if($size <= maxSize){
                            if(move_uploaded_file($tmpName, './modules/mod_image/'.$name)){
                                echo "L'upload a bien été effectuer";
                                echo "<br>";
                            }
                            else{
                                echo "Un problème est survenue";
                                echo "<br>";
                            }
                        }
                        else{
                            echo "L'image est trop grande";
                            echo "<br>";
                        }
                    }
                    else{
                        echo "L'extension de ce fichier n'est pas supporté";
                        echo "<br>";
                    }
                    break;

                default:
                    echo "erreur : " . $this->action;
                    break;
                
            }
        } 
		
			
		
		public function connexion(){
            $this->modele->connexion;
		}
		
		public function deconnexion(){
			$this->modele->deconnexion;
		}

        public function bienvenue(){
            $this->vue->bienvenue();
        }

        
    }
?>