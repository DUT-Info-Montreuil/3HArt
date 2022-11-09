<?php

const tabExtensions = ['jpg', 'png', 'jpeg','webp'];
const maxTaille = 400000;
const LONGUEUR_MAX = 8000;  
const HAUTEUR_MAX = 8000;
<<<<<<< HEAD
=======
const REPERTOIRE = "./modules/mod_image/";
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b


    class modele_accueil{

        function __construct(){
        }

		public function connexion(){
			session_start();
			$_SESSION['login'] = "Gilgamesh";
			return "Vous êtes connecté en tant que : " . $_SESSION['login'] ;
			
		}	
		
		public function deconnexion(){
			session_start();
			if(!empty($_SESSION['login'])){
				$_SESSION = array();
				session_destroy();
				unset($_SESSION);
				return "Vous êtes deconnecté";
			}
			else{
				return "Vous n'êtes pas connecté";
			}
			
		}

<<<<<<< HEAD
		public function suppression($id){
			$repertoire = "./modules/mod_image/";
            $compteur = 0;

            if(is_dir($repertoire)){
                if($iteration = opendir($repertoire)){  
=======
		public function lireCommentaire(){
			$file = fopen('commentaire.txt','r');
			$i = 0;
			while ($line = fgets($file)) {
				$texte[$i] = $line;
				$i++;
			}
			fclose($file);
			if($i == 0){
				return -1;
			}
			else{
				return $texte;
			}

		}

		public function posterCommentaire($commentaire){
			$fichier = fopen('commentaire.txt', 'c+b');
			$contenue = file_get_contents('commentaire.txt');
			$texte = ''.$contenue.$commentaire . "\n";
			fwrite($fichier, $texte );
		}

		public function estConnecter(){
			session_start();
			if(!empty($_SESSION['login'])){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public function suppression($id){

            $compteur = -1;
<<<<<<< HEAD
			if(is_dir(REPERTOIRE)){
				if($iteration = opendir(REPERTOIRE)){  
					while(($fichier = readdir($iteration)) !== false){  
=======

            if(is_dir(REPERTOIRE)){
                if($iteration = opendir(REPERTOIRE)){  
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
                    while(($fichier = readdir($iteration)) !== false){  
>>>>>>> ad365fee47195599db5612b19522673ecd371e79
						if($compteur == $id){
							if($fichier != "." && $fichier != ".."){ 
								$fichier_info = finfo_open(FILEINFO_MIME_TYPE);
<<<<<<< HEAD
								$mime_type = finfo_file($fichier_info, $repertoire.$fichier);
								if(strpos($mime_type, 'image/') === 0){
									echo "<img src='./modules/mod_image/$fichier' width='300px' > ";
								} 
							}
						}
						else{
							$compteur ++;
						}

                    }  
=======
								$mime_type = finfo_file($fichier_info, REPERTOIRE.$fichier);
								if(strpos($mime_type, 'image/') === 0){
									unlink(REPERTOIRE.$fichier);
									header('Location: index.php?action=maChaine&module=accueil');
									exit();
								} 
							}
						}
						$compteur ++;
					}  
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
                    closedir($iteration);    
                }
            }
			return "Une erreur est survenue";

		}

		public function upload(){
<<<<<<< HEAD
			session_start();
=======
<<<<<<< HEAD
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $erreur = $_FILES['file']['error'];
			$dimensionImg = getimagesize($_FILES['file']['tmp_name']);
=======
>>>>>>> ad365fee47195599db5612b19522673ecd371e79
			if(!empty($_SESSION['login'])){
				$tmpName = $_FILES['file']['tmp_name'];
				$name = $_FILES['file']['name'];
				$size = $_FILES['file']['size'];
				$erreur = $_FILES['file']['error'];
				$dimensionImg = getimagesize($_FILES['file']['tmp_name']);
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b

				$extension = explode('.', $name);
				$extension = strtolower(end($extension));

<<<<<<< HEAD
			if($erreur == 0){
				if(in_array($extension, tabExtensions)){
					if($size <= maxTaille){
						if(($dimensionImg[0] <= LONGUEUR_MAX) && ($dimensionImg[1] <= HAUTEUR_MAX) ){
							$nomUnique = uniqid('', true); //pour généré un nom unique pour les photos au nom trop générique pour éviter qu'elles soient écrasés l'une après l'autre
							$nomUnique = $nomUnique.".".$extension;
							if(move_uploaded_file($tmpName, './modules/mod_image/'.$nomUnique)){
								echo "L'upload a bien été effectuer";
								echo "<br>";
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
=======
				if($erreur == 0){
					if(in_array($extension, tabExtensions)){
						if($size <= maxTaille){
							if(($dimensionImg[0] <= LONGUEUR_MAX) && ($dimensionImg[1] <= HAUTEUR_MAX) ){
								$nomUnique = uniqid('', true); //pour généré un nom unique pour les photos au nom trop générique pour éviter qu'elles soient écrasés l'une après l'autre
								$nomUnique = $nomUnique.".".$extension;
								if(move_uploaded_file($tmpName, REPERTOIRE.$nomUnique)){
									header('Location: index.php?action=maChaine&module=accueil');
									exit();
								}
								else{
									return "Une erreur est survenue";
									echo "<br>";
								}
							}
							else{
								return "L'image est trop grande";
							}
						}
						else{
							return "L'image est trop lourde";
							echo "<br>";
						}
					}
					else{
<<<<<<< HEAD
						return "L'extension de ce fichier n'est pas supporté";
=======
						echo "L'extension de ce fichier n'est pas supporté";
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
>>>>>>> ad365fee47195599db5612b19522673ecd371e79
						echo "<br>";
					}
				}
				else{
					return "Une erreur est survenue";
					echo "<br>";
				}
			}
			else{
				return "Vous n'êtes pas connecté";
			}
        }
		
    }
?>