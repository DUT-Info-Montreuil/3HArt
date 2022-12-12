<?php

    class vue_rechercher extends vue_generique {

        public function __construct() {
        
        }

        public function afficherResultat($resultat,$auteur) {
            ?>
                <a href="index.php?module=image&nom=<?php echo($resultat['NomImage']) ?>&action=image">
                    <div class=recherche>
                        <img class=imageMiniature src="<?php echo($resultat['pathImg']); ?>" alt="">
                        <h1><?php echo($resultat['NomImage']) ?></h1>
                        <p>publiée le <?php echo($resultat['dateCreation']) ?></p>
                        <p>par <?php echo($auteur['Pseudo'])?></p>
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