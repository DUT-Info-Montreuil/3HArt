<?php

const tabExtensions = ['jpg', 'png', 'jpeg'];
const maxTaille = 400000;


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

		public function upload(){
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $erreur = $_FILES['file']['error'];

            $extension = explode('.', $name);
            $extension = strtolower(end($extension));

			if($erreur == 0){
				if(in_array($extension, tabExtensions)){
					if($size <= maxTaille){
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