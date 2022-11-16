<?php

    class Connexion {
        static protected $bdd;

        public function __construct() {
        }

        public static function initConnexion() {
            self::$bdd = new PDO("mysql:host=database-etudiants.iut.univ-paris8.fr;
            dbname=dutinfopw20164", 
            "dutinfopw20164", 
            "rytutyta", 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }


        
    }


?>