<?php 

    class vue_generique{
        
        public function __construct() {
            ob_start();
        }

        public function getAffichage() {
            return ob_get_clean();
        }
        
    }
?>