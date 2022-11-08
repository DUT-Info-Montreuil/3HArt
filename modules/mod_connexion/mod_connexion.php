<?php

include_once('cont_connexion.php');
include_once('modele_connexion.php');
include_once('connexion.php');

Connexion::initConnexion();

$controleur = new ControleurConnexion();

//$controleur->menu();

$controleur->exec();

    class ModConnexion {

        
        
    }
?>