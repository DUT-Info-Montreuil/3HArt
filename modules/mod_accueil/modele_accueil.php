<?php

const tabExtensions = ['jpg', 'png', 'jpeg','webp'];
const maxTaille = 400000;
const LONGUEUR_MAX = 8000;  
const HAUTEUR_MAX = 8000;

const REPERTOIRE = "./modules/mod_image/";


    class modele_accueil{

        function __construct(){
        }

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

		

		public function lireCommentaire(){
			$texte = file_get_contents('test.txt');
			return $texte;

		}

		public function posterCommentaire($commentaire){
			$fichier = fopen('test.txt', 'c+b');
			fwrite($fichier, 'Un premier texte dans mon fichier');
		}

		public function suppression($id){
			$compteur = -1;

            if(is_dir(REPERTOIRE)){
                if($iteration = opendir(REPERTOIRE)){  
                    while(($fichier = readdir($iteration)) !== false){  
						if($compteur == $id){
							if($fichier != "." && $fichier != ".."){ 
								$fichier_info = finfo_open(FILEINFO_MIME_TYPE);
								$mime_type = finfo_file($fichier_info, $repertoire.$fichier);
								if(strpos($mime_type, 'image/') === 0){
									unlink(REPERTOIRE.$fichier);
									header('Location: index.php?action=bienvenue&module=accueil');
									exit();
								} 
							}
						}
						$compteur ++;
					}  
                    closedir($iteration);    
                }
            }
	
			return "Une erreur est survenue";
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
									header('Location: index.php?action=bienvenue&module=accueil');
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