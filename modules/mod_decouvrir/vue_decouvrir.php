<?php
    class VueDecouvrir{

        public function __construct() {
        }
        
        public function affiche_liste($tab) {
            foreach($tab as $t) {
                echo '<a href ="index.php?module=equipes&action=details&id=' . $t['id'] . '">' . $t['id'] . '.' . $t['nom'] . '<br>'.'</a>';
            }
        }


        public function menu() {
           
           echo "<a href =\"index.php?module=users&action=connexion\"> Connexion<br></a>";
           echo "<a href =\"index.php?module=users&action=deconnexion\"> Deconnexion <br></a>";

           echo "<a href =\"index.php?module=users&action=search\"> Search<br></a>";

           echo(
            "<div class=\"categorie\">
                <a href =\"index.php?module=users&action=3d\">3D <br></a>

                <a href=\"https://www.qries.com/\">
                     <img alt=\"Qries\" src=\"https://www.qries.com/images/banner_logo.png\" width=150\" height=\"70\">
                </a>

                <a href =\"index.php?module=users&action=paysage\">
                <img alt=\"Paysage\" src =\"publicImage/lisa.jpeg\" >
                Hello</a>

                <a href =\"index.php?module=users&action=paysage\">Paysage <br></a>
                <a href =\"index.php?module=users&action=dessin\">Dessin <br></a>
                <a href =\"index.php?module=users&action=noirblanc\">Noir & Blanc <br></a>
                

            </div>"
           );

        }
        
            


        public function affiche_details($tab) {
            echo $tab['description'] . '<br>';
            echo "Pays : " . $tab['pays'] . '<br>';
            echo "Année de création : " . $tab['annee_creation'] . '<br>';
            echo "Logo : <img src ='" . $tab['logo'] . "'>";
        }

        public function affiche_categorie($tab){
            echo $tab['description'].'<br>';
            echo "Pays: ".$tab['pays']. '<br>';
            echo "Categorie: " .$tab['categorie']. '<br>';
 
        }
        
    
    }
       

        
?>

                    

                
