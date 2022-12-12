<?php
    include_once('vue_decouvrir.php');
    include_once('modele_decouvrir.php');
    //include_once('connexion.php');

    class ControleurDecouvrir {
        private $vue;
        private $modele;
        
        public function __construct(){
            $this->vue = new VueDecouvrir();
            $this->modele = new ModeleDecouvrir();
             
        }

        public function categorie(){

            switch ($_GET['categorie']) {
                case '3d':
                    $parcourrir= $this->modele->categorie("3d");
                    foreach($parcourrir as $image){
                        $this->vue->afficheImage($image);
                    }
                    break;
                case 'paysage':
                    $parcourrir= $this->modele->categorie("paysage");
                    foreach($parcourrir as $image){
                        $this->vue->afficheImage($image);
                    }
                    break;
                case 'dessin':
                    $parcourrir=$this->modele->categorie("dessin");
                    foreach($parcourrir as $image){
                        $this->vue->afficheImage($image);
                    }
                    break;
                case 'portrait':
                    $parcourrir=$this->modele->categorie("portrait");
                    foreach($parcourrir as $image){
                        $this->vue->afficheImage($image);
                    }
                    break;
                case 'noirblanc':
                    $parcourrir=$this->modele->categorie("noirblanc");
                    foreach($parcourrir as $image){
                        $this->vue->afficheImage($image);
                    }
                    break;
            }
        }
        


        public function exec(){
            $this->vue->menu();
            echo "<br>";
            $this->categorie();
            
            
            
        }    
    }
?>
