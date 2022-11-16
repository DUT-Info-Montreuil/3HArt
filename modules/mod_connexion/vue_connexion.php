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
        }

        public function form_ajout() {
            ?>
                <form action="index.php?module=connexion&action=inscription" method="post">
                    <p>Login : </p>
                    <input type="texte" name="login" required minlength="1" maxlength="50"/>
                    <p>Password : </p>
                    <input type="texte" name="password" required minlength="1" maxlength="500"/>
                    <input type="submit" value="S'inscrire"/>
                </form>
            <?php
        }

        public function form_connexion() {
            ?>
                <form class="color-grey" action="index.php?module=connexion&action=connecter" method="post">  
                    <div class="form-element">
                        <label for="pseudo">Pseudo : </label>
                        <input type="texte" name="pseudo" required minlength="1" maxlength="50"/>
                    </div>
                    <div class="form-element">
                        <label for="motDePasse">Mot de passe : </label>
                        <input type="password" name="motDePasse" required minlength="1" maxlength="50"/>
                    </div>
                    <div class="form-element">
                        <input type="submit" value="Se connecter"/>
                    </div>
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


?>