<?php

    class vue_image extends vue_generique {        

        function __construct(){
            
        }

        public function upload() {
            return "
                <form action=index.php?module=image&action=upload method=POST enctype=multipart/form-data>
                    <label for=file>Fichier</label>
                    <input type=file name=file>
                    <button type=submit>Enregistrer</button>
                </form>
            ";
        }

        public function image($image) {
            return "";
        }

        public function miniature($nomImage) {
            return "<img class=\"imageMiniature\" src=\"$nomImage\">";
        }
        

        public function menu(){
            echo 'menu';
        }

        public function afficherTelechargement($string){
            echo "<a id = accueil href = index.php?module=image&action=telechargement&urlFichier=$string > Télécharger l'image</a>";
            //echo "<a id = telechargement href=./modules/mod_image/$string  download=$string></a>";
        }

        public function affichage($image, $note) {
        ?>
            <table class="color-white-blue">
                <tr>
                    <td class="tableDeuxCol">
                        <img class="imagePrincipale" src="<?php echo($image[0]['pathImg']); ?>">
                    </td>
                    <td class=tableDeuxCol>
                        <ol>
                            <li><p>Il y aura des choses ici sur l'auteur</p></li>
                            <li><p>Il y aura des choses ici sur la description\nExemple :</p></li>
                            <li><p><?php echo($image[0]['dateCreation']); ?></p></li>
                            <li><p>note moyenne : <?php echo($note) ?>/10</p></li>
                    </td>
                </tr>
            </table>
            <div id=commentaires class=color-light-blue>
        <?php
            if (isset($_SESSION['login'])) {
                $this->commenter();
                $this->noter();
            }

        ?>
            
        <?php
        }
        public function afficherTemps($temps){
            if(is_array($temps)){
                echo "Vous avez regardé cette image pendant $temps[0] minute(s) et $temps[1] seconde(s)";
            }
            else{
                echo "Vous avez regardé cette image pendant $temps seconde(s)";
            }
        }
		
		public function commenter(){
        ?>
            <form id=creerCommentaire method=POST action="index.php?module=image&nom=<?php echo($_GET['nom']) ?>&action=commenter" >
                <label>Entrez un commentaire : </label>
                <input type=text id=num name=commentaire></input>                
                <input type=submit name=envoyer>
            </form>
        <?php
        }
		
		public function noter(){
        ?>
            <form id=noterImage method=POST action="index.php?module=image&nom=<?php echo($_GET["nom"]) ?>&action=noter" >
                <label>Entrez une note : </label>
                <input type=text id=num name=note></input>                
                <input type=submit name=envoyer>
            </form>
        <?php
        }

		public function afficherCommentaire($commentaire,$auteur) {
            $dateCreation = $commentaire['dateCreation'];
            $contenue = $commentaire['Message'];
            ?>
                <div class=commentaire>
                    <p class=auteur><?php echo($auteur) ?></p>
                    <p class=date> le <?php echo($dateCreation) ?></p>
                    <p class=contenue><?php echo($contenue) ?></p>
                </div>
            <?php
		}
		public function fermerDiv(){
        ?>
            </div>
        <?php
        }
		public function afficher($texte){
            echo $texte;
        }
	}
?>