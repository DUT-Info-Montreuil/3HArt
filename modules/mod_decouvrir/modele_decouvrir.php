<?php


//include_once('connexion.php');

    class ModeleDecouvrir {

        public function __construct(){
        }

        public function connexion(){
			session_start();
			$_SESSION['login'] = "";
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

        public function getListe() {  

            $req = self::$bdd->prepare("SELECT * FROM Image  ");
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
            $req = self::$bdd->prepare("SELECT * FROM Utilisateurs WHERE typeImage = ?");
            $req->execute(array($id));
            $detail = $req->fetch();
            return $detail;
        }

        public function recherche(){
    
        }
  

        public function ImageParCategorie($typeImage){
            try {
                $sql= 'SELECT * from Image WHERE Categorie = $typeImage';
                $statement = self::$bdd->prepare($sql);
                $statement->execute(array($typeImage));
                $resultat = $statement->fetchAll();
                return $resultat;
            
            } catch (PDOException $e) {
                echo $e->getMessage().$e->getCode();
            }


        }
        
        
    }
?>