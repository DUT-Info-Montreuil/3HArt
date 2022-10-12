<?php

    class modele_accueil{

        function __construct(){
        }

		public function connexion(){
			session_start();
			$_SESSION['login'] = "Gilgamesh";
			//header('Location: index.php?action=bienvenue&module=connexion');
			echo "Vous êtes connecté en tant que : " . $_SESSION['login'] ;
			/* if (isset($_POST['login'])){
				$query = "SELECT * FROM users WHERE login=$_POST[login]and password=.hash(sha256,$_POST[password] ).";
			    $result = mysqli_query($conn,$query);
			    $rows = mysqli_num_rows($result);
			    if($rows==1){
				    $_SESSION['login'] = $login;
			    }else{
				  $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
			    }
			} */
		}	
		
		public function deconnexion(){
			session_start();
			if(!empty($_SESSION['login'])){
				$_SESSION = array();
				session_destroy();
				unset($_SESSION);
				echo "Vous êtes deconnecté";
				//header('Location: index.php?action=bienvenue&module=connexion');
			}
			else{
				echo "Vous n'êtes pas connecté";
				//eader('Location: index.php?action=bienvenue&module=connexion');
			}
			
		}
		
    }
?>