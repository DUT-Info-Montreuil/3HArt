<?php
require_once("cont_accueil.php");
require_once("vue_accueil.php");
require_once("modele_accueil.php");


class mod_accueil{
    private $controleur;
    
    
    function __construct() {
        $this->controleur = new cont_accueil(new modele_accueil(), new vue_accueil());
    }

    
    public function exec(){
        $this->controleur->exec();
    }

}



?>