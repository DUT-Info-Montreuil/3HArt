
<?php
const mois = [
    1 => "Janvier",
    2 => "Février",
    3 => "Mars",
    4 => "Avril",
    5 => "Mai",
    6 => "Juin",
    7 => "Juillet",
    8 => "Août",
    9 => "Septembre",
    10 => "Octobre",
    11 => "Novembre",
    12 => "Décembre",
];



    class vue_accueil{

        

        

        function __construct(){

        }

        public function formulaireInscription(){
            echo "<form method = get action = \" index.php?action=ajout&module=connexion \" >";
<<<<<<< HEAD
            echo "<input type=text name=login></input>";
            echo "<input type=text name=password></input>";
            echo "<br>";
            echo "<br>";
            echo "<input type =\"submit\" name = envoyer >";

        }

        public function formulaireSuppression(){
            echo "<form method = POST action = \" index.php?module=accueil&action=suppression \" >";
            //echo "<form action=index.php?action=suppression&module=accueil method=GET ";
                echo "<input type=text name=id></input>";
                echo "<br>";
                echo "<br>";
                echo "<input type =\"submit\" name = envoyer >";
            echo "</form>";

            //echo "<form method = get action = \" index.php?module=accueil&action=suppression \" >";

        }

=======
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

>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
        

        public function menu(){
            echo '<a href = " index.php?action=bienvenue&module=accueil" > Bienvenue </a>';
            echo "<br>";
            echo '<a href = "index.php?action=inscription&module=accueil" > FormulaireInscription</a>';
            echo "<br>";
			echo '<a href = "index.php?action=connexion&module=accueil" > Connexion</a>';
            echo "<br>";
			echo '<a href = "index.php?action=deconnexion&module=accueil" > Deconnexion</a>';
            echo "<br>";
            echo '<a href = "index.php?action=ajoutImage&module=accueil" > Poster une image</a>';
            echo "<br>";
            echo '<a href = "index.php?action=supprimerImage&module=accueil" > Supprimer une image</a>';
            echo "<br>";
            echo '<a href = "index.php?action=commenter&module=accueil" > Commenter</a>';
            echo "<br>";
            echo '<a href = "index.php?action=maChaine&module=accueil" > Ma chaine</a>';
            echo "<br>";
<<<<<<< HEAD
            echo '<a href = "index.php?action=supprimerImage&module=accueil" > Supprimer une image</a>';
            echo "<br>";
=======
            echo '<a href = "index.php?action=lireCommentaire&module=accueil" > lire les commentaires</a>';
            echo "<br>";
            
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
        }

        public function image(){
            echo "<form action=index.php?action=uploadImage method=POST enctype=multipart/form-data>";
                echo "<label for=file>Fichier </label>";
                echo "<input type=file name=file>";
                echo "<button type=submit>Enregistrer</button>";
            echo "</form>";
        }
<<<<<<< HEAD
        
=======


        public function maChaine(){
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

>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
        public function bienvenue(){
            $d = date("d");
            $m = mois[date("m")];
            $y = 20 . date("y");
            $date = $d . " " . $m . " " . $y ;
            $heure = date("H:i");
            Print("Bienvenue, Nous sommes le $date et il est $heure");
            echo "<br>";
<<<<<<< HEAD

            $repertoire = "./modules/mod_image/";
            
            if(is_dir($repertoire)){
                if($iteration = opendir($repertoire)){  
                    while(($fichier = readdir($iteration)) !== false){  
                        if($fichier != "." && $fichier != ".."){ 
                            $fichier_info = finfo_open(FILEINFO_MIME_TYPE);
                            $mime_type = finfo_file($fichier_info, $repertoire.$fichier);
                            if(strpos($mime_type, 'image/') === 0){
                                echo "<img src='./modules/mod_image/$fichier' width='300px' > ";
                            } 
                        } 
                    }  
                    closedir($iteration);    
                }
            }  
=======
            var_dump(file_exists("test.txt"));

              
>>>>>>> d919ca82232fb23178051c9e98b9bc84cdfe530b
        }

        


    }
?>