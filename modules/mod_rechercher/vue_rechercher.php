<?php

    class vue_rechercher extends vue_generique {

        public function __construct() {
        
        }

        public function afficherResultat($resultat) {
            var_dump($resultat);
            ?>
                <a href="index.php?module=image&nom=<?php echo($resultat[0]['NomImage']) ?>&action=image">
                    <div class=recherche>
                        <img class=imageMiniature src="<?php echo($resultat[0]['pathImg']); ?>" alt="">
                        <h1><?php echo($resultat[0]['NomImage']) ?></h1>
                    </div>
                </a>
            <?php
        }

        public function sansResultat() {
            ?>
                <div class="container">
                    <p>Il n'y a pas de résultat a votre recherche</p>
                </div>
            <?php
        }

    }
?>