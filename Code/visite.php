<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de Visite</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <div id="page-wrapper">
			
			<!-- Main -->
			<section id="main" class="container">
                <form name="visite" action="EnvoyerDonnee.php" method="post">
                    <label for="nomLieu">Nom du lieu</label>
                    <input type="text" id="nomLieu" name="nomLieu">         
                    <label for="numeroCivique">Numero Civique</label>
                    <input type="number" id="numeroCivique" name="numeroCivique">
                    <label for="rue">Rue</label>
                    <input type="text" id="rue" name="rue">      
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville"> 
                    <label for="Provinces">Provinces</label>
                    <select id="Provinces" name="Provinces">
                        <option value="Alberta">Alberta</option>
                        <option value="Colombie-Britannique">Colombie-Britannique</option>
                        <option value="Île-du-Prince-Édouard">Île-du-Prince-Édouard</option>
                        <option value="Manitoba ">Manitoba</option>
                        <option value="Nouveau-Brunswick">Nouveau-Brunswick</option>
                        <option value="Ontario">Ontario</option>
                        <option value="Québec">Québec</option>
                        <option value="Saskatchewan">Saskatchewan</option>
                        <option value="Terre-Neuve-et-Labrador ">Terre-Neuve-et-Labrador</option>
                    </select>
                    <label for="arrive">Date d'arrivée</label>
                    <input type="datetime-local" id="arrive" name="arrive">
                    <label for="depart">Date de départ</label>
                    <input type="datetime-local" id="depart" name="depart">
                    <br>
                    <input type="button" value="Envoyer" onclick="visite.submit()">
                </form>
            </section>
	</div>
    </body>
</html>