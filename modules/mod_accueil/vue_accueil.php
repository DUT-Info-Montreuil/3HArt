
<?php
const mois = [
    1 => "Janvier",
    2 => "Février",
    3 => "Mars",
    4 => "Avril",
    5 => "Mai",
    6 => "Juin",
    7 => "Juillet",
    8 => "Août",
    9 => "Septembre",
    10 => "Octobre",
    11 => "Novembre",
    12 => "Décembre",
];

    class vue_accueil{

        

        

        function __construct(){

        }

        public function formulaireInscription(){
            echo "<form method = get action = \" index.php?module=connexion&action=ajout \" >";
            echo "<input type=text name=login></input>";
            echo "<input type=text name=password></input>";
            echo "<br>";
            echo "<br>";
            echo "<input type =\"submit\" name = envoyer >";

        }

        public function menu(){
            echo '<a href = " index.php?action=bienvenue&module=connexion" > Bienvenue </a>';
            echo "<br>";
            echo '<a href = "index.php?action=inscription&module=connexion" > FormulaireInscription</a>';
            echo "<br>";
			echo '<a href = "index.php?action=connexion&module=connexion" > Connexion</a>';
            echo "<br>";
			echo '<a href = "index.php?action=deconnexion&module=connexion" > Deconnexion</a>';
            echo "<br>";
        }

        public function bienvenue(){
            $d = date("d");
            $m = mois[date("m")];
            $y = 20 . date("y");
            $date = $d . " " . $m . " " . $y ;
            $heure = date("H:i");
            Print("Bienvenue, Nous sommes le $date et il est $heure");
            echo "<br>";
        }


    }
?>