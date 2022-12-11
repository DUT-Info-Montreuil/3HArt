<?php

    class modele_rechercher extends Connexion{
        public function __construct(){
        }

        
        // if ( isset($_GET["submit"]) AND $_GET["submit"] == "Rechercher" )
        // {
        //  $_GET["terme"] = htmlspecialchars($_GET["search"]); //pour sécuriser le formulaire contre les failles html
        //  $search = $_GET["search"];
        //  $search = trim($search); //pour supprimer les espaces dans la requête de l'internaute
        //  $search = strip_tags($search); //pour supprimer les balises html dans la requête
        // }
        

        public function rechercher(){
            $_GET["terme"] = htmlspecialchars($_GET["search"]); //pour sécuriser le formulaire contre les failles html
            var_dump($_GET['terme']);
            $search = $_GET["search"];
            $search = trim($search); //pour supprimer les espaces dans la requête de l'internaute
            $search = strip_tags($search); //pour supprimer les balises html dans la requête
        
            if (isset($search)){
                $search = strtolower($search);
                $search_query = $bdd->prepare("SELECT idImage FROM Image WHERE nomImage LIKE ? ");
                $search_query1 = $bdd->prepare("SELECT idImage FROM Tag WHERE Tag LIKE ?");

                $search_query->execute(array("%".$search."%", "%".$search."%"));
                $search_query1->execute(array("%".$search."%", "%".$search."%"));
            }
            else{
                $message = "Vous devez entrer votre requete dans la barre de recherche";
            }
            $req = Connexion::$bdd->prepare("SELECT idImage FROM Image WHERE nomImage like%?%");
            $req1 = Connexion::$bdd->prepare("SELECT idImage FROM Hastag WHERE hastag like %?");

            $req->execute(array($_GET["search"]));
            $req1->execute(array($_GET["search"]));
            
            $tab = $req->fetchall();
            $tab = $req1->fetchall();


            if(isset($tab[0])) {
                $_SESSION['login'] = $tab[0]['login'];
            }
        }        

    }

    
?>