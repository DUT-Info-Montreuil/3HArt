<?php

include_once('connexion.php');

    class ModeleDecouvrir extends Connexion{

        public function __construct(){
        }

        public function getListe() {  

            $req = self::$bdd->prepare("SELECT * FROM ");
            $req->execute();
            $tab = $req->fetchAll();

            return $tab;
        }



        public function getDetails($id) {
            $req = self::$bdd->prepare("SELECT * FROM users WHERE id = ?");
            $req->execute(array($id));
            $t = $req->fetch();
            
            return $t;
        }
    }
?>