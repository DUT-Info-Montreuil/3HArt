<?php
 
   class modele_connexion extends Connexion{
       public function __construct(){
       }
      
 
       public function inscription(){
           if(isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['password']) && $_POST['password']==$_POST['confirmPassword']){
               $pwhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
               $req = Connexion::$bdd->prepare("INSERT INTO Utilisateur(Pseudo, MotDePasse, Mail, Premium) VALUES (?,?,?,false)");
               $req->execute(array($_POST['login'],$pwhash,$_POST['mail']));
               $_SESSION['login'] = $_POST['login'];
               /*Récup id*/
               $req = Connexion::$bdd->prepare("SELECT IdUtilisateur FROM Utilisateur WHERE Pseudo = ?");
               $req->execute(array($_POST['login']));
               $tab = $req->fetch();
               $_SESSION['id'] =$tab['IdUtilisateur'];
           }
       }
 
        public function connexion() {
            $req = Connexion::$bdd->prepare("SELECT IdUtilisateur, MotDePasse FROM Utilisateur WHERE Pseudo = ?");
            $req->execute(array($_POST['login']));
            $tab = $req->fetch();
            if(isset($tab) && password_verify($_POST['password'], $tab['MotDePasse'])) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id'] =$tab['IdUtilisateur'];
            }
              
       }
 
       public function deconnexion() {
           if(!empty($_SESSION['login'])){
               $_SESSION = array();
               session_destroy();
               unset($_SESSION);
               return 0;
           }
           else{
               return 1;
           }
        }

        

    }
?>