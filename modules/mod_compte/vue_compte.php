<?php

  class vue_compte extends vue_generique {

      function __construct() {

      }

      public function menu(){
?>
          <p>Vous êtes sur la page compte</p>
<?php
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

  }
?>