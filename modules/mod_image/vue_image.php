<?php

    class vue_image{        

        function __construct(){

        }

        public function afficherImage($image) {
            echo("<img src=\"$image\"");
        }

        public function menu(){
            echo '<a href = " index.php?module=image&action=image" > Afficher Image </a>';
        }

    }
?>