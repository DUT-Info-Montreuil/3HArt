<?php



require_once("modules/mod_accueil/mod_accueil.php");

    echo "<HEADER> ";
		echo "<META CHARSET = UTF-8/>";
		echo "<TITLE> 3HArt </TITLE>";
        $mod = new mod_accueil();
        $mod->exec();
		
    echo "</HEADER>"; 

    echo "<BODY>";
        
        
    echo "</BODY>";

    

    

    echo "<FOOTER>";
        echo "<p>";
            echo "<A HREF = accueil.html>";
		        echo "<IMG SRC = image/logo.png alt = Logo du site/>";
		    echo "</A>";
            echo "<br>";
		    echo "Creative commons licence - Amegadjen Fabrice, 2022 Site réalisé dans le cadre de la ressource Développement Web";
		echo "</p>";
    echo "</FOOTER>";

    


      





?>