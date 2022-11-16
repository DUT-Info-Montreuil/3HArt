<?php

    class vue_image{        

        function __construct(){
            
        }

        public function image($image) {
            return "<img class=\"imagePrincipale\" src=\"$image\"";
        }

        public function miniature($image) {
            return "<img class=\"imageMiniature\" src=\"$image\">";
        }
        

        public function menu(){
            echo 'menu';
        }

        public function afficherTelechargement($string){
            echo "<a href=./modules/mod_image/$string  download=$string>Télécharger l'image</a>";
        }

        public function affichage($idImage) {
            $image = $this->image($idImage);
            return "<table>
                <tr>
                    <td class=\"tableDeuxCol\">$image</td>
                    <td class=\"tableDeuxCol\">
                        <ol>
                            <li><p>Il y aura des choses ici sur l'auteur</p></li>
                            <li><p>Il y aura des choses ici sur la description\nExemple :</p></li>
                            <li><p>Il y aura des choses ici sur la date de publication</p></li>
                            <li><p>Il y aura des choses ici sur la note</p></li>
                    </td>
                </tr>
            </table>";
        }
		
		public function commenter($nom){
            echo "<form method = POST action = \" index.php?module=image&nom=$nom&action=image \" >";
                echo "<label>Entrez un commentaire</label> ";
                echo "<input type=text id= num name=commentaire></input>";
                echo "<br>";
                echo "<br>";
                echo "<input type =\"submit\" name = envoyer >";
            echo "</form>";


        }

  
	
		public function afficherCommentaires($commentaire){
			for($i = 0; $i <= sizeof($commentaire) -1 ; $i++){
				echo $commentaire[$i]['auteur'] . " as ecrit le " .  $commentaire[$i]['dateCreation'] . " : " . $commentaire[$i]['contenue'] ;
				echo "<br><br>";
			}
		}
		
		public function afficher($texte){
            echo $texte;
        }
		
		public function accueil(){
            echo '<a href = "index.php?module=image" > Accueil</a>';
        }
		
		
		
		public function espacer(){
            echo "<br><br>";
        }
	}
?>