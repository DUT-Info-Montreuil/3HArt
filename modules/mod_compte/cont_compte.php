<?php
require_once("modele_compte.php");
require_once("vue_compte.php");



    class cont_compte {

        private $modele;
        private $vue;

        function __construct($modele, $vue) {
            $this->modele = $modele;
            $this->vue = $vue;
        }
         
        function exec(){
            echo ($this->vue->menu());
            if(isset($_GET['action'])){
                switch($_GET['action']) { 
                    case "inscription":
                        $this->vue->formulaireInscription();
                        break;

                    case "connexion";
                        $this->vue->afficher($this->modele->connexion());
                        break;
                    
                    case "deconnexion";
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
                }
            }
        }
        
    }
?>