<?php

    class cont_compte {

        private $modele;
        private $vue;

        function __construct($modele, $vue) {
            $this->modele = $modele;
            $this->vue = $vue;
        }
         
        function exec(){
            $this->vue->menu(
                $this->modele->getMyCompte($_SESSION['id'], $_SESSION['login']),
                $this->modele->getMyImage()
            );
            if(isset($_GET['action'])){
                switch($_GET['action']) { 
                    
                }
            }
        }
        
    }
?>