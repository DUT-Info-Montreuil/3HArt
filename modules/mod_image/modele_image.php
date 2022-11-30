<?php

const tabExtensions = ['jpg', 'png', 'jpeg','webp'];
const maxTaille = 400000;
const LONGUEUR_MAX = 8000;  
const HAUTEUR_MAX = 8000;

const REPERTOIRE = "./imageTest/";

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

		public function postImage($name,$chemin) {
			try {
				$sql = 'INSERT INTO Image (NomImage, pathImg, IdUtilisateur) VALUES (?,?,?)';
				$statement = self::$bdd->prepare($sql);
				$auteur = $this->getIdUtilisateur($_SESSION["login"])[0]["IdUtilisateur"];
				var_dump($name);
				var_dump($chemin);
				$statement->execute(array($name,$chemin,$auteur));
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}

		public function upload(){
			if(!empty($_SESSION['login'])){
				$tmpName = $_FILES['file']['tmp_name'];
				$name = $_FILES['file']['name'];
				$size = $_FILES['file']['size'];
				$erreur = $_FILES['file']['error'];
				$dimensionImg = getimagesize($_FILES['file']['tmp_name']);

				$extension = explode('.', $name);
				$extension = strtolower(end($extension));

				if($erreur == 0){
					if(in_array($extension, tabExtensions)){
						if($size <= maxTaille){
							if(($dimensionImg[0] <= LONGUEUR_MAX) && ($dimensionImg[1] <= HAUTEUR_MAX) ){
								$nomUnique = uniqid('', true); //pour généré un nom unique pour les photos au nom trop générique pour éviter qu'elles soient écrasés l'une après l'autre
								$nomUnique = $nomUnique.".".$extension;
								if(move_uploaded_file($tmpName, REPERTOIRE.$nomUnique)){
									$chemin = REPERTOIRE.$nomUnique;
									$this->postImage($name,$chemin);
									header('Location: index.php?module=accueil');
									exit();
								}
								else{
									echo "Une erreur est survenue";
									echo "<br>";
								}
							}
							else{
								echo "L'image est trop grande";
							}
						}
						else{
							echo "L'image est trop lourde";
							echo "<br>";
						}
					}
					else{
						echo "L'extension de ce fichier n'est pas supporté";
						echo "<br>";
					}
				}
				else{
					echo "Une erreur est survenue";
					echo "<br>";
				}
			}
			else{
				echo "Vous n'êtes pas connecté";
			}	
		}
    }
?>