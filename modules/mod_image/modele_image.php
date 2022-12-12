<?php

//const tabExtensions = ['jpg', 'png', 'jpeg','webp'];
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
		public function calculerTemps($temps){
			if($temps >= 3600){ 
				$heures = intdiv($temps, 3600); 
				$minutes =  intdiv(fmod($temps, 3600), 60); 
				$secondes = fmod($temps, 60)  ;
				return array($heures, $minutes, $secondes);
			}
			else if($temps >= 60){
				$minutes = intdiv($temps, 60);
				$secondes = fmod($temps, 60);
				return array($minutes, $secondes);
			}
			else{
				return $temps;
			}
		}

		public function telechargement($urlFichier){
			header("Content-Transfer-Encoding: Binary"); 
			header("Content-disposition: attachment; filename=\"" . basename($urlFichier) . "\""); 
			readfile($urlFichier);
			exit();
		}
		
		public function dateT(){
			$d = date("d");
            $m = date("m");
            $y = 20 . date("y");
            $date = $d . "/" . $m . "/" . $y ;
			return $date;
		
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

		public function getImage($nomImage) {
			try {
				$sql = 'SELECT * FROM Image WHERE NomImage LIKE ?';
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
				$sql = 'SELECT * FROM dutinfopw20164.Commenter WHERE IdImage=?';
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
				$statement->execute(array($name,$chemin,$auteur));
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}
		
		public function ajouterNote($note, $idImage){
			$auteur = $_SESSION["id"];
			$sql = 'SELECT * FROM Noter WHERE IdImage=? and IdUtilisateur =?';
			$statement = self::$bdd->prepare($sql);
			var_dump($idImage);
			$statement->execute(array($idImage[0]['IdImage'],$auteur));
			$resultat = $statement->fetchAll();
			
			if(is_numeric($note)){
				if($note >= 0){
					if($note <= 10){
						if(!empty($resultat)){
							$sql = " UPDATE Noter SET Note = ?  WHERE IdUtilisateur = ? and IdImage = ?";
							$parametre = array($note, $auteur, $idImage[0]['IdImage']);// TODO changer le 5 par la variable $auteur quand le module connexion implementer
						}
						else{
							$sql = 'INSERT INTO Noter (IdUtilisateur, IdImage, Note) VALUES (?,?,?)';
							$parametre = array($auteur, $idImage[0]['IdImage'], $note);// TODO changer le 5 par la variable $auteur quand le module connexion implementer
						}	
						try {
							var_dump($parametre);
							$statement = self::$bdd->prepare($sql);
							$statement->execute($parametre); 
						}
						catch (PDOExeception $e) {
							echo $e->getMessage().$e->getCode();
						}
					}
					else{
						return -3;
					}
				}
				else{
					return -2;
				}
			}
			else{
				return -1;
			}
		}
		
		public function obtenirMoyenne($image){
			$idImage = $image[0]['IdImage'];
			try {
				$sql = 'SELECT SUM(Note), Count(Note) FROM Noter WHERE IdImage=?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($idImage));
				$resultat = $statement->fetchAll();
				if($resultat[0]['Count(Note)'] != 0 ){ 
					$moyenne = $resultat[0]["SUM(Note)"] / $resultat[0]["Count(Note)"];
					return $moyenne;
				}
				else{
					return "Cette image n'a pas encore était noté";
				}
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
		}

		public function upload(){
			$tabExtensions = ['jpg', 'png', 'jpeg','webp'];
			if(!empty($_SESSION['login'])) {
				if (!empty($_FILES)) {
					$tmpName = $_FILES['file']['tmp_name'];
					$name = $_FILES['file']['name'];
					$size = $_FILES['file']['size'];
					$erreur = $_FILES['file']['error'];
					$dimensionImg = getimagesize($_FILES['file']['tmp_name']);

					$extension = explode('.', $name);
					$extension = strtolower(end($extension));

					if($erreur == 0){
						if(in_array($extension, $tabExtensions)){
							if($size <= maxTaille){
								if(($dimensionImg[0] <= LONGUEUR_MAX) && ($dimensionImg[1] <= HAUTEUR_MAX) ){
									$nomUnique = uniqid('', true); //pour généré un nom unique pour les photos au nom trop générique pour éviter qu'elles soient écrasés l'une après l'autre
									$nomUnique = $nomUnique.".".$extension;
									if(move_uploaded_file($tmpName, REPERTOIRE.$nomUnique)){
										$chemin = REPERTOIRE.$nomUnique;
										$this->postImage(rtrim($name,".".$extension),$chemin);
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
			}
			else{
				echo "Vous n'êtes pas connecté";
			}	
		}
    }
?>