<?php

    class vue_image{        

        function __construct(){
            
        }

        public function image($image) {
            return "<img class=\"imagePrincipale\" src=\"$image\"";
        }

        public function miniature($image) {
            return "<img class=\"imageMiniature\" src=\"$image\">";
        }
        

        public function menu(){
            echo 'menu';
        }

        public function affichage($idImage) {
            $image = $this->image($idImage);
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