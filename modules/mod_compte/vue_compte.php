<?php

  class vue_compte extends vue_generique {

      function __construct() {

      }

      public function menu(){
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

      public function nav() {
        $connecter = false;// TODO: remplacer par test de connexion quand mod_connexion faite
        if (isset($_SESSION['login']))
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
            <a href=\"index.php?module=image&action=upload\">
              <img class=\"icon\" src=\"./publicImage/upload.svg\" alt=\"Poster une image\"></img>
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
      

      public function pasConnecter(){
          echo "Vous devez être connecté pour continuer";
      }

      public function maChaine($pasImage) {// TODO: A mettre dans mod_compte
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

      public function bienvenue() {
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