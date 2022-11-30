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
/*
		public function enregistrerCommentaire($idImage, $auteur, $contenue ){
			$fichier = file_get_contents("commentaire.json");
			
			$commentaire = array(
				"idCommentaire" => uniqid('', true),
				"auteur" => utf8_encode($auteur),
				"dateCreation" => $this->dateT(),
				"contenue" => utf8_encode($contenue),
			);
			
			$fichier = json_decode($fichier, true);
			
			if(!isset($fichier[$idImage])){ // à mettre dans upload ou équivalent
				$fichier[$idImage] =  array();
			}
			
			$fichier[$idImage][count($fichier[$idImage])] = $commentaire;  
			
			$json = json_encode($fichier);
			file_put_contents("commentaire.json", $json);
		} 
*/
    }
?>