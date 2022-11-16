<?php

    class modele_image{

        function __construct(){
        }

		public function cheminImage($nomImage) {
			return "./imageTest/$nomImage";
		}

		public function getDescription($id){
			//TODO récupérer dans la base de donnée
			return "details des images";
		}
    }
?>