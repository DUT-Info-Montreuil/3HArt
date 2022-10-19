<?php
    require_once("modules/mod_accueil/mod_accueil.php");
    include_once('modules/mod_decouvrir/mod_decouvrir.php');

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
            echo ("<a href=\"index.php?module=decouvrir\">Découverte</a>");
            break;

        case 'decouvrir':
            $mod = new ModDecouvrir();
            $mod->exec();
            break;
    }

    function 

    echo("<FOOTER>
            <p>
                <a href = index.php>
                    \#<img src = image/logo.png alt = Logo du site/>
                </a>
            </p>
        </FOOTER>
    </BODY>");
    
?>