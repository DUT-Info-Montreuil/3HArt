<?php

const tabExtensions = ['jpg', 'png', 'jpeg','webp'];
const maxTaille = 400000;
const LONGUEUR_MAX = 8000;  
const HAUTEUR_MAX = 8000;


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

		public function suppression($id){
			$repertoire = "./modules/mod_image/";
            $compteur = 0;

            if(is_dir($repertoire)){
                if($iteration = opendir($repertoire)){  
                    while(($fichier = readdir($iteration)) !== false){  
						if($compteur == $id){
							if($fichier != "." && $fichier != ".."){ 
								$fichier_info = finfo_open(FILEINFO_MIME_TYPE);
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
                    closedir($iteration);    
                }
            }

		}

		public function upload(){
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
?>