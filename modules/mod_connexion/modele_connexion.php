<?php

include_once('Connexion.php');

    class modele_connexion extends Connexion{
        public function __construct(){
        }

        public function inscription(){

            if(isset($_POST['login']) && isset($_POST['password'])){
                $pwhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $req = Connexion::$bdd->prepare("INSERT INTO connexion(login, password) VALUES (?, ?)");
                $req->execute(array($_POST["login"], $pwhash));
                return($_POST["login"]);
            }
            return NULL;
        }

        public function connexion() {
                $req = Connexion::$bdd->prepare("SELECT * FROM connexion WHERE login = ?");
                $req->execute(array($_POST['login']));
                $tab = $req->fetchall();

                if(isset($tab[0]) && password_verify($_POST['password'], $tab[0]['password'])) {
                    $_SESSION['login'] = $tab[0]['login'];
                }    
        }

        public function deconnexion() {
            if(isset($_SESSION['login'])) {
                unset($_SESSION['login']);
            }
        }
        

    }
?>