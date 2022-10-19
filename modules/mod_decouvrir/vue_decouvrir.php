<?php
    class VueDecouvrir{

        public function __construct() {
        }
        public function bienvenue() {
            echo 'bienvenue';
        }
        public function affiche_liste($tab) {
            foreach($tab as $t) {
                echo '<a href ="index.php?module=equipes&action=details&id=' . $t['id'] . '">' . $t['id'] . '.' . $t['nom'] . '<br>'.'</a>';
            }
        }
        public function menu() {
           echo "<a href =\"index.php?module=users&action=bienvenue\">Bienvenue <br></a>";
           echo "<a href =\"index.php?module=users&action=liste\">Liste <br></a>"; 
        }
        
        public function affiche_details($tab) {
                echo $tab['description'] . '<br>';
                echo "Pays : " . $tab['pays'] . '<br>';
                echo "Année de création : " . $tab['annee_creation'] . '<br>';
                echo "Logo : <img src ='" . $tab['logo'] . "'>";
            }
        }
?>