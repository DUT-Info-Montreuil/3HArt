<?php

    class vue_image{        

        function __construct(){
            
        }

        public function image($image) {
            return "<img class=\"imagePrincipale\" src=\"$image\"";
        }

        public function miniature($nomImage) {
            return "<img class=\"imageMiniature\" src=\"$nomImage\">";
        }
        

        public function menu(){
            echo 'menu';
        }

        public function afficherTelechargement($string){
            echo "<a id = telechargement href=./modules/mod_image/$string  download=$string>Télécharger l'image</a>";
        }

        public function affichage($nomImage,$tabCommentaires) {
            $image = $this->image($nomImage);
            $aAfficher = "
                <table class=\"color-white-blue\">
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
                </table>
                <div id=\"commentaires\" class=\"color-light-blue\">
                "
            ;
            //if (isset($_SESSION['login'])) {
            if (true) { // TODO: a changer
                $commenter = $this->commenter();
                $aAfficher = $aAfficher.$commenter;
            }
            $aAfficher = $aAfficher.$tabCommentaires."</div>";

            return $aAfficher;
        }
		
		public function commenter(){
            return "
                <form id=\"creerCommentaire\" method=\"POST\" action=\"index.php?module=image&nom=".$_GET["nom"]."&action=commenter\" >
                    <label>Entrez un commentaire : </label>
                    <input type=\"text\" id=\"num\" name=\"commentaire\"></input>                
                    <input type=\"submit\" name=\"envoyer \">
                </form>
            ";
        }

		public function afficherCommentaire($commentaire,$auteur) {
            $dateCreation = $commentaire['dateCreation'];
            $contenue = $commentaire['Message'];
            $commentaireVue = "
                <div class=\"commentaire\">
                    <p class=\"auteur\">$auteur</p>
                    <p class=\"date\"> le $dateCreation</p>
                    <p class=\"contenue\">$contenue</p>
                </div>
            ";
            return $commentaireVue;
		}
		
		public function afficher($texte){
            echo $texte;
        }
		
		public function accueil(){
            echo '<a id = accueil href = "index.php?module=image" > Accueil</a>';
        }
		
		
		
		public function espacer(){
            echo "<br><br>";
        }
	}
?>