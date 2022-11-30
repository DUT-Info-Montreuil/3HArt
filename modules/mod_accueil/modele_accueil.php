<?php

    class modele_accueil{

        function __construct(){
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