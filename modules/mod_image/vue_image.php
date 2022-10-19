<?php

    class vue_image{        

        function __construct(){
            
        }

        public function afficherImage($image) {
            return "<img class=\"imagePrincipale\" src=\"$image\"";
        }

        public function menu(){
            echo '<a href = " index.php?module=image&action=image" > Afficher Image </a>';
        }

        public function affichage($idImage) {
            $image = $this->afficherImage($idImage);
            return "<table>
                <tr>
                    <td class=\"tableDeuxCol\">$image</td>
                    <td class=\"tableDeuxCol\">
                        <ol>
                            <li><p>Il y aura des choses ici sur l'auteur</p></li>
                            <li><p>Il y aura des choses ici sur la description\nExemple :</p></li>
                            <li><p>Il y aura des choses ici sur la date de publication</p></li>
                            <li><p>Il y aura des choses ici sur la note</p></li>
                    </td>
                </tr>
            </table>";
        }

    }
?>