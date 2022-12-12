<?php

    class vue_connexion extends vue_generique {
        
        public function __construct() {
            parent::__construct();
        }

        public function form_inscription() {
            ?>
                <div class="container">
                    <form class="color-dark-blue" action="index.php?module=connexion&action=inscrire" method="post">
                        <div class="form-element">
                            <label for="login">Pseudo : </label>
                            <input type="texte" name="login" required minlength="1" maxlength="50"/>
                        </div>
                        <div class="form-element">
                            <label for="mail">Email : </label>
                            <input type="email" name="mail" required minlength="1" maxlength="50"/>
                        </div>
                        <div class="form-element">
                            <label for="password">Mot de passe : </label>
                            <input type="password" name="password" required minlength="1" maxlength="50"/>
                        </div>
                        <div class="form-element">
                            <label for="confirmPassword">Confirmer mot de passe : </label>
                            <input type="password" name="confirmPassword" required minlength="1" maxlength="50"/>
                        </div>
                        <div class="form-element">
                            <input type="submit" value="S'inscrire"/>
                        </div>
                    </form>
                </div>
            <?php
        }

        public function form_connexion() {
            ?>
                <div class="container">
                    <form class="color-dark-blue" action="index.php?module=connexion&action=connecter" method="post">  
                        <div class="form-element">
                            <label for="login">Pseudo : </label>
                            <input type="texte" name="login" required minlength="1" maxlength="50"/>
                        </div>
                        <div class="form-element">
                            <label for="password">Mot de passe : </label>
                            <input type="password" name="password" required minlength="1" maxlength="50"/>
                        </div>
                        <div class="form-element">
                            <input type="submit" value="Se connecter"/>
                            <a href = "index.php?action=addInscription&module=connexion" >s'inscrire</a>
                        </div>
                    </form>
                </div>
            <?php
        }

        public function resultat_connexion() {
            if(isset($_SESSION['login']) ) {
                
                echo "Vous êtes connecté.e sous le login : " . $_POST['login'];
                header('Refresh: 3; index.php');
            }
            else{
                echo "Erreur de connexion";
            }
        }

        public function resultat_inscription() {
            if(isset($_SESSION['login']) ) { 
                echo "Vous êtes inscrit.e sous le login : " . $_SESSION['login'];
                header('Refresh: 3; index.php');
            }
            else{
                echo "Erreur d'inscription";
            }
        }
        

        public function resultat_deconnexion($codeErreur) {
            if($codeErreur==1) {
                echo " Vous n'êtes pas connecté"; 
                header('Refresh: 3; index.php');
            }
            else {
                echo "Déconexion réussi";
            }
        }
    }    

?>