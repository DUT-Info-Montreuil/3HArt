<?php

//include_once('connexion.php');

    class ModeleDecouvrir {

        public function __construct(){
        }

        // public function connexion(){
		// 	session_start();
		// 	$_SESSION['login'] = "Gilgamesh";
		// 	echo "Vous êtes connecté en tant que : " . $_SESSION['login'] ;
			
		// }	

		// public function deconnexion(){
		// 	session_start();
		// 	if(!empty($_SESSION['login'])){
		// 		$_SESSION = array();
		// 		session_destroy();
		// 		unset($_SESSION);
		// 		echo "Vous êtes deconnecté";
		// 	}
		// 	else{
		// 		echo "Vous n'êtes pas connecté";
		// 	}
		// }

        
        
        public function getListe() {  
            $req = self::$bdd->prepare("SELECT * FROM ");
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }
 
        public function getDetails($id) {
            $req = self::$bdd->prepare("SELECT * FROM users WHERE id = ?");
            $req->execute(array($id));
            $detail = $req->fetch();
        
            return $detail;
        }

        public function getDetailsTypeImage($typeImage) {
            $req = self::$bdd->prepare("SELECT * FROM users WHERE typeImage = ?");
            $req->execute(array($id));
            $detail = $req->fetch();
        
            return $detail;
        }

        public function search(){
            echo "search";
            return NULL;
    
        }

        public function categorie($typeImage){
            switch ($typeImage) {
                case '3d':
                    //$this->modele->getDetailsTypeImage(3d);
                    break;
                case 'paysage':
                    break;
                case 'dessin':
                    break;
                case 'noirblanc':
                    break;
                
                default:
                    # code...
                    break;
            }

        }

        
        
    }
?>
