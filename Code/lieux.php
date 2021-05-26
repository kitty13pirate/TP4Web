<?php
require_once 'RecevoirDonnee.php';
$donnee = new classeDonnee();
$donnee->getDonneesMySQL();
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
                <form action="visite.php">
                    <label for="nomLieu">Nom du lieu</label>
                    <input type="text" id="nomLieu" name="nomLieu" value="Test" readonly>
                    <label for="arrive">Date d'arrivée</label>
                    <input type="datetime-local" id="arrive" name="arrive" value="2021-04-14T08:52" readonly>
                    <label for="depart">Date de départ</label>
                    <input type="datetime-local" id="depart" name="depart" value="2021-05-14T08:52" readonly>
                    <br>
                    <input type="submit" value="J'avais une pathologie contagieuse durant cette visite"/>
                </form>
            </section>
	</div>
    </body>
</html>