<?php
require_once("cont_image.php");
require_once("vue_image.php");
require_once("modele_image.php");


class mod_image {

    private $controleur;
        
    function __construct(){
        $this->controleur = new cont_image(new modele_image(), new vue_image());
    }
    
    public function exec(){
        $this->controleur->exec();
    }

}
?>
