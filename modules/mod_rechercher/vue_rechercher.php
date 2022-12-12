<?php

    class vue_rechercher extends vue_generique {

        public function __construct() {
        
        }

        public function afficherResultat($cheminResultat) {
            ?>
                <div class=>
                    <img class=imageMiniature src="<?php echo($cheminResultat[0]['pathImg']); ?>" alt="">
                </div>
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