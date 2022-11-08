<?php

    class modele_image{

        function __construct(){
        }
/*
		public function connexion(){
			session_start();
			$_SESSION['login'] = "Gilgamesh";
			echo "Vous êtes connecté en tant que : " . $_SESSION['login'] ;
			
		}	
		
		public function deconnexion(){
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
			
		}
*/	
		public function getDescription($id){
			//TODO récupérer dans la base de donnée
			return "details des images";
		}
    }
?>