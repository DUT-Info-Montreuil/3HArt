<?php



    class modele_image{

        function __construct(){
        }

		public function connexion(){
			session_start();
			$_SESSION['login'] = "Gilgamesh";
			// return "Vous êtes connecté en tant que : " . $_SESSION['login'] ;
			
		}	
		
		/*public function deconnexion(){
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
*/	
		public function getDescription($id){
			//TODO récupérer dans la base de donnée
			return "details des images";
		}
		
		public function dateT(){
			$d = date("d");
            $m = date("m");
            $y = 20 . date("y");
            $date = $d . "/" . $m . "/" . $y ;
			return $date;
		
		}
		
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

		
		public function getImages(){
			$images = array();
            if(is_dir(REPERTOIRE)){
				if($iteration = opendir(REPERTOIRE)){  
					$i = 0;
					while(($fichier = readdir($iteration)) !== false){ 
						if($fichier != "." && $fichier != ".."){ 
							$fichier_info = finfo_open(FILEINFO_MIME_TYPE);
							$mime_type = finfo_file($fichier_info, REPERTOIRE.$fichier);
							if(strpos($mime_type, 'image/') === 0 || strpos($mime_type, 'application/') === 0 ){
								$images[$i] = $fichier;
								$i++;
							} 
						}
					}  
					closedir($iteration);    
					return $images;
                }
            }
			else{
				return "Une erreur est survenue";
			}

		}
		
		
		
		
		public function lireCommentaires($idImage){
			$json = file_get_contents("commentaire.json");
			$json =	json_decode($json, true);
			
			if(isset($json[$idImage]) && count($json[$idImage]) != 0){
				$commentaire = $json[$idImage];
				for($i = 0; $i <= sizeof($commentaire) -1 ; $i++){
					$commentaire[$i]['auteur'] = utf8_decode($commentaire[$i]['auteur']);
					$commentaire[$i]['contenue'] = utf8_decode($commentaire[$i]['contenue']) ;
				}
				return $commentaire;
			}
			else{
				return -1;
			}
			

		}
		
		
    }
?>