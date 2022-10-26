<?php

include_once('cont_decouvrir.php');
include_once('modele_decouvrir.php');

//Connexion::initConnexion();

$controleur = new ControleurDecouvrir();

$controleur->menu();

switch($controleur->get_action()) {
    case "details":
        $controleur->detailsUsers();
        break;
    case "liste":
        $controleur->liste();
        break;
}

?>

