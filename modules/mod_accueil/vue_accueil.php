
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

        public function nav() {
          $connecter = false;// TODO: remplacer par test de connexion quand mod_connexion faite
          if ($connecter)
            return "<a class=\"bouton\" href=\"index.php?module=connexion&action=deconnexion\">Deconnexion</a>";
          else
            return "
            <a class=\"bouton\" href=\"index.php?module=connexion&action=connexion\">Connexion</a>
            <a class=\"bouton\" href=\"index.php?module=connexion&action=inscription\">Inscription</a>
            ";
        }

        public function menu() {
            return "
            <nav>
              <a href=\"\"><img src=\"\" alt=\"Logo\" /></a>
              <a class=\"bouton\" href=\"index.php?module=connexion&action=connexion\">Connexion</a>
              <a class=\"bouton\" href=\"index.php?module=connexion&action=inscription\">Inscription</a>
              <a class=\"bouton\" href=\"index.php?module=connexion&action=deconnexion\">Deconnexion</a>
              <a class=\"bouton\" href=\"index.php?action=ajoutImage&module=accueil\">Ajouter une image</a>
            </nav>

            <div class=\"list-image-scroll\">
                <ul class=\"row-list\">

                </ul>
            </div>

            <div>
              <div>
                <a href=\"\">
                  <img src=\"\" alt=\"\"></img>
                  <p></p>
                </a>
              </div>
              <div>
                <a href=\"\">
                  <img src=\"\" alt=\"\"></img>
                  <p></p>
                </a>
              </div>
              <div>
                <a href=\"\">
                  <img src=\"\" alt=\"\"></img>
                  <p></p>
                </a>
              </div>
              <div>
                <a href=\"\">
                  <img src=\"\" alt=\"\"></img>
                  <p></p>
                </a>
              </div>
            </div>
            ";
        }

        public function image(){
            return "
            <form action=index.php?action=uploadImage method=POST enctype=multipart/form-data>
               <label for=file>Fichier</label>
               <input type=file name=file>
               <button type=submit>Enregistrer</button>
            </form>
            ";
        }

        public function bienvenue(){
            $d = date("d");
            $m = mois[date("m")];
            $y = 20 . date("y");
            $date = $d . " " . $m . " " . $y ;
            $heure = date("H:i");
            Print("Bienvenue, Nous sommes le $date et il est $heure");
            echo "<br>";
            echo "<br>";

            $repertoire = "./modules/mod_image/";




            if($iteration = opendir($repertoire)){
                while(($fichier = readdir($iteration)) !== false){
                    if($fichier != "." && $fichier != ".."){
                        $fichier_info = finfo_open(FILEINFO_MIME_TYPE);
                        $mime_type = finfo_file($fichier_info, $repertoire.$fichier);
                        if(strpos($mime_type, 'image/') === 0){
                            echo "<img src='./modules/mod_image/$fichier' width='300px' ><br>";
                            echo "<br>";

                        }
                    }
                }
                closedir($iteration);
            }
        }




    }
?>
