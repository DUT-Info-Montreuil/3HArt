<?php

    class modele_image extends Connexion {

        function __construct(){
        }

		public function cheminImage($nomImage) {
			return "./imageTest/$nomImage";
		}

		public function getIdImage($nomImage) {
			try {
				$sql = 'SELECT IdImage FROM Image WHERE NomImage LIKE ?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($nomImage));
				$resultat = $statement->fetchAll();
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}

		public function getNomUtilisateur($idUtilisateur) {
			try {
				$sql = 'SELECT pseudo FROM Utilisateur WHERE IdUtilisateur=?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($idUtilisateur));
				$resultat = $statement->fetchAll();
				$resultat[0]["pseudo"] = utf8_decode($resultat[0]["pseudo"]);
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}

		public function getIdUtilisateur($pseudo) {
			try {
				$sql = 'SELECT IdUtilisateur FROM Utilisateur WHERE pseudo=?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($pseudo));
				$resultat = $statement->fetchAll();
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}

		public function getCommentaire($idImage) {
			try {
				$sql = 'SELECT * FROM Commenter WHERE IdImage=?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array(intval($idImage)));
				$resultat = $statement->fetchAll();
				for($i = 0 ; $i < sizeof($resultat) ; $i++){
					$resultat[$i]["Message"] = utf8_decode($resultat[$i]["Message"]);
				}
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}

		public function postCommentaire($auteur, $idImage, $contenue) {			
			try {
				$sql = 'INSERT INTO Commenter (IdUtilisateur, IdImage, Message) VALUES (?,?,?)';
				$statement = self::$bdd->prepare($sql);
				$auteur = $this->getIdUtilisateur($auteur)[0]["IdUtilisateur"];
				$idImage = $this->getIdImage($idImage)[0]["IdImage"];
				var_dump($idImage);
				$contenue = utf8_encode($contenue);
				$statement->execute(array($auteur, $idImage, $contenue));
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		} 
    }
?>