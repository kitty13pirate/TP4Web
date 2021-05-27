<?php
require_once 'RecevoirDonnee.php';
require_once 'auth.session.php';

if (getSessionExiste()){
    $Utilisateur = $_SESSION['infoAuth'];

}


$donnee = new classeDonnee();
$enregistrements = $donnee->getDonneesMySQL($Utilisateur);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lieux visités</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <div id="page-wrapper">
			<!-- Main -->
			<section id="main" class="container">
<?php
$donnee->writeForms($enregistrements);        
?>
            </section>
	    </div>
    </body>
</html>