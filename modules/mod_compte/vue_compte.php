<?php

  class vue_compte extends vue_generique {

      function __construct() {

      }

      public function menu($compte, $mesImages) {
?>
          
          <p>Mes information :</p>
            <?php
              $this->compte($compte);
            ?>
          <p>Mes Images :</p>
          <ol class="liste-flex-h">
            <?php  
              // $compte;
              foreach ($mesImages as $image) {
                ?>
                  <li class="element-flex">
                    <a href="index.php?module=image&nom=<?php echo($image['NomImage']) ?>&action=image">
                      <img class="imageMiniature" src="<?php echo($image['pathImg']); ?>" alt="">
                    </a>
                    <div>

                    </div>
                  </li>
                <?php
              }
            ?>
          </ol>
<?php
      }
      
      public function compte($compte) {
        if (!isset($_GET['action'])) {
          ?>
          <div>
            <p><?php echo($compte['Pseudo']) ?></p>
            <p>
              <?php 
                if ($compte['Premium']=='0') echo("Le compte n'est pas Prenuim\n Pour passer en prenuium cliquez ici");
                else echo("Le compte est Prenuim\n Pour ne plus être prenuium cliquez ici")
              ?>
            </p>
          </div>
      <?php
        }
        elseif ($_GET['action']=="supprimer") {
          ?>
          <div>
            <p>Etes vous sûr de vouloir supprimer votre compte</p>
            <a href="">Oui</a>/<a href="">Non</a>
          </div>
      <?php
        }
        else

        // 'IdUtilisateur' => string '18' (length=2)
        // 0 => string '18' (length=2)
        // 'Pseudo' => string 'nono' (length=4)
        // 1 => string 'nono' (length=4)
        // 'MotDePasse' => string '$2y$10$5tNFL4eVZ/2YGoYywgKmbe3GIi0Bi96KbVv8B14YqdqxOSz65TPg6' (length=60)
        // 2 => string '$2y$10$5tNFL4eVZ/2YGoYywgKmbe3GIi0Bi96KbVv8B14YqdqxOSz65TPg6' (length=60)
        // 'Mail' => string 'nono@gmail.com' (length=14)
        // 3 => string 'nono@gmail.com' (length=14)
        // 'Premium' => string '0' (length=1)
        // 4 => string '0' (length=1)
          var_dump($compte);
      }

      public function maChaine($pasImage) {// TODO: A mettre dans mod_compte
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