<?php
    
    session_start();
    require_once("Connexion.php");
    require_once("modules/mod_accueil/mod_accueil.php");
    require_once("modules/mod_decouvrir/mod_decouvrir.php");
    require_once("modules/mod_image/mod_image.php");
    require_once("modules/mod_connexion/mod_connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <META CHARSET=UTF-8/>
        <title> 3HArt </title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <a href=""><img src="" alt="Logo" /></a>
        </header>

        <nav>
            <form action = rechercher.php method = GET>
                <input type = search name = search>
                <input type = submit name = submit value = Rechercher>
            </form>
            <div class="elementADroite">
                
                ".boutonNav()."
                <a class="bouton" href="index.php?action=ajoutImage&module=accueil">Ajouter une image</a>
            </div>
        </nav>
        <?php
            $module = isset($_GET['module']) ? $_GET['module'] : 'accueil';
            

            switch ($module) {
                case 'accueil':
                    $mod = new mod_accueil();
                    $mod->exec();
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
        <footer>
            <p>
                <a href = index.php>
                    <img src = "publicImage/logo.png" alt = "Logo du site"/>
                </a>
            </p>
        </footer>
    </body>
</html>