<?php 
/**
 * La configuration et le démarrage des sessions doit être fait avant le début 
 * de l'envoi de la réponse.
 */

require_once 'auth.session.php';
    if (getSessionExiste()){
        $nom = $_SESSION['infoAuth'];

    } else {
        setcookie("erreurAuth", "Vous devez vous authentifier", 0, "/", "rail.techinfo420.ca", true, true);
        header("Location: index.php");      
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Ici c'est la zone protégée pour ".$nom;
        ?>
    </body>
</html>
