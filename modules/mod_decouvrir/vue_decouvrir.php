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

           echo "<a href =\"index.php?module=users&action=3d\">3D <br></a>";

          
            echo "<a href=\"https://www.qries.com/\">
                     <img alt=\"Qries\" src=\"https://www.qries.com/images/banner_logo.png\" width=150\" height=\"70\">
                </a>";



           echo "<a href =\"index.php?module=users&action=paysage\">Paysage <br></a>";
           echo "<a href =\"index.php?module=users&action=dessin\">Dessin <br></a>";
           echo "<a href =\"index.php?module=users&action=noirblanc\">Noir & Blanc <br></a>";
            

        }

        public function affiche_details($tab) {
                echo $tab['description'] . '<br>';
                echo "Pays : " . $tab['pays'] . '<br>';
                echo "Année de création : " . $tab['annee_creation'] . '<br>';
                echo "Logo : <img src ='" . $tab['logo'] . "'>";
            }
        }
       

        
?>


                    <!-- 
                    foreach ($gamers as $g) {
                        echo '<li>';
                        echo '<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamerByName/', $g['name'], '">', $g['name'], '</a><br>';
                        echo $g['adress'], '<br>';
                        echo '--<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamersByCity/', $g['city'], '">', $g['city'], '</a>';
                        echo '</li>';
                    }
                     -->
                
<!--                     
                    if (isset($gamer)) {
                        echo 'Thông tin chi tiết về game thủ:';
                        echo '<li>';
                        echo '<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamerByName/', $gamer['name'], '">', $gamer['name'], '</a><br></li>';
                        echo '<li>', $gamer['adress'], '</li>';
                        echo '<li>', $gamer['city'], '</li>';
                    }
                    if (isset($gamersInCities)) {
                        echo 'Các game thủ ở: <b>', $gamersInCities[0]['city'], '</b>';
                        foreach ($gamersInCities as $g) {
                            echo '<li>';
                            echo '<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamersByCity/', $g['name'], '">', $g['name'], ' </a>';
                            echo $g['adress'], ' ';
                            echo $g['city'];
                            echo '</li>';
                        }
                    }   -->
                    
                
