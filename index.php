<?php

    require_once("modules/mod_accueil/mod_accueil.php");
    require_once("modules/mod_decouvrir/mod_decouvrir.php");
    require_once("modules/mod_image/mod_image.php");
    require_once("modules/mod_connexion/mod_connexion.php");

    echo("
    <html>
        <head>
            <META CHARSET = UTF-8/>
            <title> 3HArt </title>
            <link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">
        </head>
        
        <body>");
        $module = isset($_GET['module']) ? $_GET['module'] : 'accueil';

    switch ($module) {
        case 'accueil':
            $mod = new mod_accueil();
            $mod->exec();
            //echo ("<a href=\"index.php?module=decouvrir\">Decouvrir</a><br>");
            //echo ("<a href=\"index.php?module=image\">Image</a>");
            break;

        case 'decouvrir':
            $mod = new mod_decouvrir();
            $mod->exec();
            break;
        case 'connexion':
            $mod = new mod_connexion();
            $mod->exec();
            break;
        
        case 'image':
            $mod = new mod_image();
            $mod->exec();
            break;
    }
    echo("
            <footer>
                <p>
                    <a href = index.php>
                        <img src = \"publicImage/logo.png\" alt = \"Logo du site\"/>
                    </a>
                </p>
            </footer>
        </body>
    </html>");
    
?>