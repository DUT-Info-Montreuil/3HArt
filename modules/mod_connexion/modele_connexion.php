<?php
 
 include_once('Connexion.php');
 
   class modele_connexion extends Connexion{
       public function __construct(){
       }
      
 
       public function inscription(){
           session_start();
           if(isset($_POST['login']) && isset($_POST['mail']) && $_POST['password']==$_POST['confirmPassword']){
               $pwhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
               $req = Connexion::$bdd->prepare("INSERT INTO Utilisateur(Pseudo, MotDePasse, Mail, Premium) VALUES (?,?,?,false)");
               $req->execute(array($_POST['login'],$pwhash,$_POST['mail']));
               $_SESSION['login'] = $_POST['login'];
               return($_POST["login"]);
              
           }
           return NULL;
       }
 
       public function connexion() {
           session_start();
               $req = Connexion::$bdd->prepare("SELECT MotDePasse FROM Utilisateur WHERE Pseudo = ?");
               $req->execute(array($_POST['login']));
               $tab = $req->fetchall();
               if(isset($tab[0]) && password_verify($_POST['password'], $tab[0]['MotDePasse'])) {
                   $_SESSION['login'] = $_POST['login'];
               }
              
       }
 
       public function deconnexion() {
           session_start();
           if(!empty($_SESSION['login'])){
               $_SESSION = array();
               session_destroy();
               unset($_SESSION);
               echo "Vous êtes deconnecté";
           }
           else{
               echo "Vous n'êtes pas connecté";
           }
           // if(isset($_SESSION['login'])) {
           //     unset($_SESSION['login']);
           // }
        }

        

    }
?>