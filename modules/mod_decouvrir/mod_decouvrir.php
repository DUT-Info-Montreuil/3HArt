

<?php

include_once('cont_decouvrir.php');
include_once('modele_decouvrir.php');


class mod_decouvrir{
    private $controleur;

    function __construct(){
        $this->controleur = new controleur_decouvrir();
    }
    //Connexion::initConnexion();

    public function exec(){
        $this->controleur->exec();
        
    }


}
?>


