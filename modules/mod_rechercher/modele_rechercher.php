<?php

    class modele_rechercher extends Connexion{
        
        public function __construct(){

        }

        public function rechercher(){
            $search = htmlspecialchars($_POST["search"]);
            $search = trim($search); //pour supprimer les espaces dans la requête de l'internaute
            $search = strip_tags($search); //pour supprimer les balises html dans la requête
        
            if (isset($search)){
                $search = strtolower($search);
                $search_query = self::$bdd->prepare("SELECT idImage FROM Image WHERE nomImage LIKE ? ");
                $tmpTag = self::$bdd->prepare("SELECT * FROM Tag");
                //$search_query1 = self::$bdd->prepare("SELECT idImage FROM Tag WHERE Tag LIKE ?");
                var_dump($search);
                $search_query->execute(array("%".$search."%"));
                $tmpTag->execute();
                $resultatTmp = $tmpTag->fetchAll();
                //$search_query1->execute(array("%".$search."%"));
                $resultat = $search_query->fetchAll();
                var_dump($resultat);
                var_dump($resultatTmp);
                //var_dump($search_query1);
                //TODO : mettre dans un set les deux recherche pour n'avoir qu'une fois chaque image
                return $resultat;
            }
            else{
                $message = "Vous devez entrer votre requete dans la barre de recherche";
            }
        }

        public function getCheminImage($idImage) {
			try {
				$sql = 'SELECT pathImg FROM Image WHERE IdImage LIKE ?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($idImage));
				$resultat = $statement->fetchAll();
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}
    }

    
?>