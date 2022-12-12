<?php
    class VueDecouvrir{

        public function __construct() {
        }
        
        public function affiche_liste($tab) {
            foreach($tab as $t) {
                echo '<a href ="index.php?module=decouvrir&action=liste&id=' . $t['id'] . '">' . $t['id'] . '.' . $t['nom'] . '<br>'.'</a>';
            }
        }
        public function menu() {
        
           echo "<a href =\"index.php?module=users&action=3d\">3D <br></a>";
            affichage();

           echo "<a href =\"index.php?module=users&action=paysage\">Paysage <br></a>";
           echo "<a href =\"index.php?module=users&action=portrait\">Portrait <br></a>";
           echo "<a href =\"index.php?module=users&action=dessin\">Dessin <br></a>";
           echo "<a href =\"index.php?module=users&action=noirblanc\">Noir & Blanc <br></a>";
        }

        public function affiche_details($tab) {
                echo $tab['description'] . '<br>';
                echo "Pays : " . $tab['pays'] . '<br>';
                echo "Année de création : " . $tab['annee_creation'] . '<br>';
                echo "Logo : <img src ='" . $tab['logo'] . "'>";
        }
        
        public function afficheImageParCategorie($typeImage){
            $image= $this->image($typeImage, idImage); 
            
        }
        public function affichage($idImage) {
            $image = $this->image($idImage);
            return "<table>
                <tr>
                    <td class=\"tableDeuxCol\">$image</td>
                </tr>
            </table>";
        }
    }

        
?>


