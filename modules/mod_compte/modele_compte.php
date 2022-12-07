<?php

    class modele_compte{

        function __construct() {

        }

        public function getMyCompte() {
            try {
				$sql = 'SELECT * FROM Image WHERE IdUtilisateur = ?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($nomImage));
				$resultat = $statement->fetchAll();
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
        }

        public function getMyImage() {
            try {
				$sql = 'SELECT * FROM Image WHERE IdUtilisateur = ?';
				$statement = self::$bdd->prepare($sql);
				$statement->execute(array($nomImage));
				$resultat = $statement->fetchAll();
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
        }
			
    }
?>