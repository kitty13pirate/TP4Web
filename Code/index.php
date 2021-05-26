<?php
    if (isset($_COOKIE['erreurAuth'])){
        $erreurAuth = filter_input(INPUT_COOKIE, "erreurAuth", FILTER_SANITIZE_SPECIAL_CHARS);
        setcookie("erreurAuth", "", time()-3600*60*24, "/", "rail.techinfo420.ca", true, true);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Authentification</title>
    </head>
    <body>
        <form name="auth" action="auth.redirect.php" method="post">
<?php
    if (isset($erreurAuth)){
        echo '<p style="background-color: yellow;">'.$erreurAuth.'</p>';
    }

    ?>          
            <input type="text" name="nom" placeholder="Nom d'usager">
            <input type="password" name="mdp" placeholder="Mot de passe">
            <input type="button" value="Go" onclick="auth.submit()">
        </form>
    </body>
</html>
