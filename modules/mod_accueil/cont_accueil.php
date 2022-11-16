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
            $this->vue->menu();
            if (isset($_GET['action'])) {
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
                        
                    case "ajout";
                        $this->modele->ajout($_GET["login"],$_GET["password"]);
                        break;

                    case "maChaine";
                        $this->vue->maChaine();
                        break;

                    case "commenter";
                        $this->vue->commenter();
                        break;

                    case "posterCommentaire";
                        $this->modele->posterCommentaire($_POST["commentaire"]);
                        break;

                    case "lireCommentaire";
                        $this->vue->afficher($this->modele->lireCommentaire());
                        break;

                    case "ajoutImage";
                        session_start();
                        if(!empty($_SESSION['login'])){
                            $this->vue->image();
                        }
                        else{
                            echo "Veuillez vous connecter pour utiliser ce service ou souscriver à notre offre exceptionnel de 999€";
                        }
                        break;

                    case "supprimerImage";
                        $this->vue->formulaireSuppression();
                        break;

                    case "suppression";
                        $this->modele->suppression($_POST["id"]);
                        break;


                    case "uploadImage";
                        $this->modele->upload();
                        break;

                    default:
                        echo "erreur : " . $this->action;
                        break;
                }        
            }
        }
        
    }
?>