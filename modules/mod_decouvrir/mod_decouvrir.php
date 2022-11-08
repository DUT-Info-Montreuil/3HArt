<?php

include_once('cont_decouvrir.php');
include_once('modele_decouvrir.php');

//Connexion::initConnexion();
class mod_decouvrir {
    private $controleur;
    
    
    function __construct(){
        $this->controleur = new ControleurDecouvrir(new ModeleDecouvrir(), new VueDecouvrir());
    }

    
    public function exec(){
        $this->controleur->exec();
        switch($_GET['action']) {
            case "details":
                $controleur->detailsUsers();
                break;
            case "liste":
                $controleur->liste();
                break;
        }
    }
}

?>

