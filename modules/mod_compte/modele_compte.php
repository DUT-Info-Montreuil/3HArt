<?php

    class modele_compte extends Connexion {

        function __construct() {

        }

        public function getMyCompte($idUtilisateur, $nomUtilisateur) {
            try {
				$sql = 'SELECT * FROM Utilisateur WHERE IdUtilisateur = ? AND Pseudo = ?';
				// var_dump($idUtilisateur);
				// var_dump($nomUtilisateur);
				$tab = array($idUtilisateur, $nomUtilisateur);
				// var_dump($tab);
				$statement = self::$bdd->prepare($sql);
				$statement->execute($tab);
				$resultat = $statement->fetch();
				// var_dump($resultat);
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
				$statement->execute(array($_SESSION['id']));
				$resultat = $statement->fetchAll();
				return $resultat;
			}
			catch (PDOExeception $e) {
				echo $e->getMessage().$e->getCode();
			}
        }
			
    }
?>