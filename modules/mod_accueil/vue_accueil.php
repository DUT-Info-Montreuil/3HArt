
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

        public function formulaireInscription() { // TODO: mettre méthode dans mod_connexion
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
          $nav = $this->nav(); // TODO: mettre dans le controleur
          return "
          <header>
            <a href=\"\"><img src=\"\" alt=\"Logo\" /></a>
          </header>
          <nav>
            <div class=\"elementADroite\">
              $nav
              <a class=\"bouton\" href=\"index.php?action=ajoutImage&module=accueil\">Ajouter une image</a>
            </div>
          </nav>

          <div id=\"accueil-list-image\" class=\"list-image-scroll\">
              <ul class=\"row-list\">
                <li class=\"inline\">
                  <a href=\"index.php?module=image&nom=6356cfeea83ca.webp&action=image\">
                    <img class=\"inline grande-image-pour-list\" src=\"./imageTest/6356cfeea83ca.webp\" alt=\"\">
                  </a>
                </li>
                <li class=\"inline\">
                  <a href=\"index.php?module=image&nom=628b1ba0599c7.webp&action=image\">
                    <img class=\"inline grande-image-pour-list\" src=\"./imageTest/628b1ba0599c7.webp\" alt=\"\">
                  </a>
                </li>
                <li class=\"inline\">
                  <a href=\"index.php?module=image&nom=6313b92632599.webp&action=image\">
                    <img class=\"inline grande-image-pour-list\" src=\"./imageTest/6313b92632599.webp\" alt=\"\">
                  </a>
                </li>
                <li class=\"inline\">
                  <a href=\"index.php?module=image&nom=63583382a6aa1.webp&action=image\">
                    <img class=\"inline grande-image-pour-list\" src=\"./imageTest/63583382a6aa1.webp\" alt=\"\">
                  </a>
                </li>
              </ul>
          </div>

          <div id=\"option\">
            <div>
              <a href=\"index.php?module=accueil&action=ajoutImage\">
                <img class=\"icon\" src=\"./imageTest/upload.svg\" alt=\"Poster une image\"></img>
                <p>Poster Image</p>
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
                <p>Plus</p>
              </a>
            </div>
          </div>

          <div id=\"album\">
            <div><a href=\"\"><img src=\"\" alt=\"\"></a></div>
            <div><a href=\"\"><img src=\"\" alt=\"\"></a></div>
            <div><a href=\"\"><img src=\"\" alt=\"\"></a></div>
            <div><a href=\"\"><img src=\"\" alt=\"\"></a></div>
          </div>

          <div id=\"decouvrir\"><a href=\"\"><img src=\"\" alt=\"\"></a></div>

          <div id=\"listAbonnement\">
            <ul></ul>
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
            // $repertoire = "./modules/mod_image/"; // TODO: A mettre dans utile




            // if($iteration = opendir($repertoire)){
            //     while(($fichier = readdir($iteration)) !== false){
            //         if($fichier != "." && $fichier != ".."){
            //             $fichier_info = finfo_open(FILEINFO_MIME_TYPE);
            //             $mime_type = finfo_file($fichier_info, $repertoire.$fichier);
            //             if(strpos($mime_type, 'image/') === 0){
            //                 echo "<img src='./modules/mod_image/$fichier' width='300px' ><br>";
            //                 echo "<br>";

            //             }
            //         }
            //     }
            //     closedir($iteration);
            // }
        }




    }
?>
