<?php
require_once("cont_accueil.php");
require_once("vue_accueil.php");
require_once("modele_accueil.php");


class mod_accueil{
    private $controleur;
    
    
    function __construct(){
        $vue = new vue_accueil();
        $modele = new modele_accueil();
        $this->controleur = new cont_accueil($modele, $vue);
    }

    
    public function exec(){
        $this->controleur->exec();
    }

}
    


      





?>