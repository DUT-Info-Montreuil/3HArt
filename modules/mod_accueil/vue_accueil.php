
<?php




    class vue_accueil{

        

        

        function __construct(){

        }

        public function formulaireInscription(){
            echo "<form method = get action = \" index.php?action=ajout&module=connexion \" >";
                echo "<label>Entrez votre login : </label> ";
                echo "<input type=text name=login></input>";
                echo "<br>";
                echo "<br>";
                echo "<label>Entrez votre mot de passe : </label> ";
                echo "<input type=text name=password></input>";
                echo "<br>";
                echo "<br>";
                echo "<input type =\"submit\" name = envoyer >";
            echo "</form>";

        }

        public function formulaireSuppression(){
            echo "<form method = POST action = \" index.php?module=accueil&action=suppression \" >";
                echo "<label>Entrez l'indice de l'image à supprimer</label> ";
                echo "<input type=text id= num name=id></input>";
                echo "<br>";
                echo "<br>";
                echo "<input type =\"submit\" name = envoyer >";
            echo "</form>";


        }

        public function commenter(){
            echo "<form method = POST action = \" index.php?module=accueil&action=posterCommentaire \" >";
                echo "<label>Entrez votre commentaire</label> ";
                echo "<input type=text id= num name=commentaire></input>";
                echo "<br>";
                echo "<br>";
                echo "<input type =\"submit\" name = envoyer >";
            echo "</form>";


        }

        

        public function menu(){
            echo '<a href = " index.php?action=bienvenue&module=accueil" > Bienvenue </a>';
            echo "<br>";
            echo '<a href = "index.php?action=inscription&module=accueil" > FormulaireInscription</a>';
            echo "<br>";
			echo '<a href = "index.php?action=connexion&module=accueil" > Connexion</a>';
            echo "<br>";
			echo '<a href = "index.php?action=maChaine&module=accueil" > Ma chaine</a>';
            echo "<br><br>";
            
            
        }

        public function image(){
            echo "<form action=index.php?action=uploadImage method=POST enctype=multipart/form-data>";
                echo "<label for=file>Fichier </label>";
                echo "<input type=file name=file>";
                echo "<button type=submit>Enregistrer</button>";
            echo "</form>";
        }

        public function pasConnecter(){
            echo "Vous devez être connecté pour continuer";
        }


        public function maChaine($pasImage){
            echo '<a href = " index.php?action=bienvenue&module=accueil" > Accueil </a>';
            echo "<br>";
            echo '<a href = "index.php?action=deconnexion&module=accueil" > Deconnexion</a>';
            echo "<br>";
            echo '<a href = "index.php?action=ajoutImage&module=accueil" > Poster une image</a>';
            echo "<br>";
            echo '<a href = "index.php?action=supprimerImage&module=accueil" > Supprimer une image</a>';
            echo "<br>";
            echo '<a href = "index.php?action=commenter&module=accueil" > Commenter</a>';
            echo "<br>";
            echo '<a href = "index.php?action=lireCommentaire&module=accueil" > Afficher les commentaires</a>';
            echo "<br>";
            echo '<a href = "index.php?action=maChaine&module=accueil" > Masquer les commentaires</a>';
            echo "<br><br>";
            if($pasImage){
                $this->afficheVosImage();
            }
            

            


        }

        public function afficheVosImage(){
            $repertoire = "./modules/mod_image/";
            
            if(is_dir($repertoire)){
                if($iteration = opendir($repertoire)){  
                    while(($fichier = readdir($iteration)) !== false){  
                        if($fichier != "." && $fichier != ".."){ 
                            $fichier_info = finfo_open(FILEINFO_MIME_TYPE);
                            $mime_type = finfo_file($fichier_info, $repertoire.$fichier);
                            if(strpos($mime_type, 'image/') === 0){
                                echo "<img src='./modules/mod_image/$fichier' width=300px  > "; //
                            } 
                        } 
                    }  
                    closedir($iteration);    
                }
            }
        }

        public function afficher($texte){
            echo $texte;
        }

        public function afficherCommentaires($tab){
            foreach ($tab as &$texte) {
                print_r($texte);
                echo "<br><br>";
            }
            
        }

        

        


    }
?>