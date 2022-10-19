<?php

    require_once("modules/mod_accueil/mod_accueil.php");
    #require_once('modules/mod_decouvrir/mod_decouvrir.php');
    require_once("modules/mod_image/mod_images.php");

    echo("<head>
        <META CHARSET = UTF-8/>
        <title> 3HArt </title>
        <link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">
    </head>
    
    <BODY>");
    $_GET['module']=isset($_GET['module']) ? $_GET['module'] : 'accueil';

    switch ($_GET['module']) {
        case 'accueil':
            $mod = new mod_accueil();
            $mod->exec();
            echo ("<a href=\"index.php?module=decouverte\">Découverte</a><br>");
            echo ("<a href=\"index.php?module=image\">Image</a>");
            break;

        case 'decouverte':
            # code...
            break;
        
        case 'image':
            $mod = new mod_image();
            $mod->exec();
            break;

    }
    echo("<FOOTER>
            <p>
                <a href = index.php>
                    \#<img src = image/logo.png alt = Logo du site/>
                </a>
            </p>
        </FOOTER>
    </BODY>");
    
?>