<?php
    require_once("modules/mod_accueil/mod_accueil.php");
    include_once('modules/mod_decouvrir/mod_decouvrir.php');

    #require_once('decouvrir/mod_decouvrir.php');

    echo("<HEADER>
            <META CHARSET = UTF-8/>
            <title> 3HArt </title>
            <link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">
        </head>

        <body>

            <header>
                <a href=\"\"><img src=\"\" alt=\"Logo\" /></a>
            </header>

            <nav>
                <div class=\"elementADroite\">
                    <form action = rechercher.php method = GET>
                        <input type = search name = search>
                        <input type = submit name = submit value = Rechercher>
                    </form>
                    ".boutonNav()."
                    <a class=\"bouton\" href=\"index.php?action=ajoutImage&module=accueil\">Ajouter une image</a>
                </div>
            </nav>
        ");
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

    function boutonNav() {
        $connecter = false;// TODO: remplacer par test de connexion quand mod_connexion faite
        if ($connecter)
          return "<a class=\"bouton\" href=\"index.php?module=connexion&action=deconnexion\">Deconnexion</a>";
        else
          return "
          <a class=\"bouton\" href=\"index.php?module=connexion&action=connexion\">Connexion</a>
          <a class=\"bouton\" href=\"index.php?module=connexion&action=inscription\">Inscription</a>
          ";
      }
    
?>