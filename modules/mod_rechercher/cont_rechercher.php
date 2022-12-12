<?php

    require_once("vue_rechercher.php");
    require_once("modele_rechercher.php");

    class cont_rechercher {
        private $modele;
        private $vue;

        public function __construct() {
            $this->vue = new vue_rechercher();
            $this->modele = new modele_rechercher(); 
        }

        public function exec() {
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'rechercher':
                        $resultat = $this->modele->rechercher();
                        if(!empty($resultat)){
                            foreach($resultat as $image) {
                                $this->vue->afficherResultat($image, $this->modele->getPseudoUtilisateur($image['IdUtilisateur']));
                            }
                        }
                        else {
                            $this->vue->sansResultat();
                        }
                        break;
                    }
            }
        }
    }

?>