<?php

    require_once("modules/mod_accueil/mod_accueil.php");
    #require_once('decouvrir/mod_decouvrir.php');

    echo("<HEADER>
        <META CHARSET = UTF-8/>
        <TITLE> 3HArt </TITLE>
    </HEADER>
    
    <BODY>");
    $_GET['module']=isset($_GET['module']) ? $_GET['module'] : 'accueil';

    switch ($_GET['module']) {
        case 'accueil':
            $mod = new mod_accueil();
            $mod->exec();
            // echo ("<a href=\"index.php?module=decouverte\">Découverte</a>");
            break;

        case 'decouverte':
            # code...
            break;
    }
    /*echo("<FOOTER>
            <p>
                <a href = index.php>
                    \#<img src = image/logo.png alt = Logo du site/>
                </a>
            </p>
        </FOOTER>
    </BODY>");*/
    
?>