
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
            echo "<form method = get action = \" index.php?module=connexion&action=ajout \" >";
            echo "<input type=text name=login></input>";
            echo "<input type=text name=password></input>";
            echo "<br>";
            echo "<br>";
            echo "<input type =\"submit\" name = envoyer >";

        }

        public function menu(){
            echo '<a href = " index.php?action=bienvenue&module=accueil" > Bienvenue </a>';
            echo "<br>";
            echo '<a href = "index.php?action=inscription&module=accueil" > FormulaireInscription</a>';
            echo "<br>";
			echo '<a href = "index.php?action=connexion&module=accueil" > Connexion</a>';
            echo "<br>";
			echo '<a href = "index.php?action=deconnexion&module=accueil" > Deconnexion</a>';
            echo "<br>";
            echo '<a href = "index.php?action=ajoutImage&module=accueil" > Ajouter une image</a>';
            echo "<br>";
        }

        public function image(){
            echo "<form action=index.php?action=uploadImage method=POST enctype=multipart/form-data>";
                echo "<label for=file>Fichier </label>";
                echo "<input type=file name=file>";
                echo "<button type=submit>Enregistrer</button>";
            echo "</form>";
        }

        public function bienvenue(){
            $d = date("d");
            $m = mois[date("m")];
            $y = 20 . date("y");
            $date = $d . " " . $m . " " . $y ;
            $heure = date("H:i");
            Print("Bienvenue, Nous sommes le $date et il est $heure");
            echo "<br>";

            $repertoire = "./home/etudiants/info/famegadjen/local_html/SAE_Dev/3HArt/modules/mod_image";
            

             if(is_dir($repertoire)){  
                if($iteration = opendir($repertoire)){  
                    while(($fichier = readdir($iteration)) !== false){  
                        if($fichier != "." && $fichier != ".."){ 
                            $fichier_info = finfo_open(FILEINFO_MIME_TYPE);
                            $mime_type = finfo_file($fichier_info, $repertoire.$fichier);
                            if(strpos($mime_type, 'image/') === 0){
                                 // afficher images  
                            }
                        } 
                    } 
                }  
                closedir($iteration);    
            }  
        }

        


    }
?>