

<?php

include_once('cont_decouvrir.php');
include_once('modele_decouvrir.php');


class ModDecouvrir{
    private $controleur;

    function __construct(){
        $this->controleur = new ControleurDecouvrir();
    }
    //Connexion::initConnexion();

    public function exec(){
        $this->controleur->exec();
    

        if (isset($_GET['action'])){
            switch($_GET['action']) {
                case "details":
                    $this->controleur->detailUser();
                    break;
                case "action":
                    $this->controleur->detail

            }
        };


        
        
    }


}


?>

