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
                $search_query = self::$bdd->prepare("SELECT * FROM Image WHERE nomImage LIKE ? ");
                $tmpTag = self::$bdd->prepare("SELECT * FROM Tag");
                //$search_query1 = self::$bdd->prepare("SELECT idImage FROM Tag WHERE Tag LIKE ?");
                $search_query->execute(array("%".$search."%"));
                $tmpTag->execute();
                $resultatTmp = $tmpTag->fetchAll();
                //$search_query1->execute(array("%".$search."%"));
                $resultat = $search_query->fetchAll();
                //var_dump($search_query1);
                //TODO : mettre dans un set les deux recherche pour n'avoir qu'une fois chaque image
                return $resultat;
            }
            else{
                $message = "Vous devez entrer votre requete dans la barre de recherche";
            }
        }

        public function getPseudoUtilisateur($idUtilisateur) {
            try {
				$sql = 'SELECT Pseudo FROM Utilisateur WHERE IdUtilisateur LIKE ?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($idUtilisateur));
				$resultat = $statement->fetch();
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
        }
    }

    
?>