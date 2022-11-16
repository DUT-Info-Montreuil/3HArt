<?php
include_once('vue_generique.php');
    class vue_connexion extends vue_generique{
        public function __construct() {
            parent::__construct();
        }

        public function menu() {
            echo "<a href =\"index.php?module=connexion&action=ajout\">Inscription<br></a>";
            if(!isset($_SESSION['login'])) {
                echo '<a href="index.php?module=connexion&action=connexion">Connexion</a><br>';
            }
            else if(isset($_SESSION['login'])) {
                echo '<a href="index.php?module=connexion&action=deconnexion">Déconnexion</a> <br> ';
            }
            else if (isset($_SESSION['inscription'])){
                echo '<a href="index.php?module=connexion&action=inscription">Inscription</a> <br> ';
            }
        }

        public function form_inscription() {
            ?>
                <form action="index.php?module=connexion&action=addInscription" method="post">
                        <p>Login : <input type="texte" name="login" required minlength="1" maxlength="50"/></p>
                        <p>Password : <input type="password" name="password" required minlength="1" maxlength="500"/></p>
                        <p><input type="submit" value="S'inscrire"/></p>
                </form>
            <?php
        }

        public function form_connexion() {
            ?>
                <form action="index.php?module=connexion&action=connecter" method="post">
                        <p>Login : <input type="texte" name="login" required minlength="1" maxlength="50"/></p>
                        <p>Password : <input type="password" name="password" required minlength="1" maxlength="500"/></p>
                        <p><input type="submit" value="Se connecter"/></p>
                </form>
            <?php
        }

        public function resultat_connexion() {
            if(isset($_SESSION['login'])) {
                echo "Vous êtes connecté.e sous le login : " . $_POST['login'];
            }
            else{
                echo "Erreur de connexion";
            }
        }

        public function resultat_inscription() {
            echo "Vous vous êtes correctement inscrit";
        }
        

        public function resultat_deconnexion() {
            if(!isset($_SESSION['login'])) {
                echo "Vous n'êtes pas connecté"; 
            }        
        }
    }    
// hello 123456

?>