<?php
require_once 'data/Connexion.abstract.php';
require_once 'data/ConnexionAuthentification.classe.php';

    class classeDonnee{
        public function getDonneesMySQL($Utilisateur){
            try{
                    
                $cd = new ConnexionAuthentification();
                $maConnexionPDO = $cd->getConnexion();
                    
                //La requête est préparée avec insertion d'une variable.
                $pdoRequete = $maConnexionPDO->prepare("SELECT * FROM railwil_TP4.Visite WHERE Utilisateur=:Utilisateur;");
                //La requête complétée, avec une valeur sur la variable, est passée au
                // serveur de bd, sur le schéma.
                $pdoRequete->bindParam(":Utilisateur",$Utilisateur,PDO::PARAM_STR);
                $pdoRequete->execute();
                $enregistrements = $pdoRequete->fetchAll();
                return $enregistrements;

            } catch (Exception $e) {
                //error_log permet d'écrire dans le log d'erreur php.
                error_log("Exception pdo: ".$e->getMessage());
                        
                //Dans ce cas-ci la gestion d'erreur prévoit une page d'information.
                header("Location: info.php?message=Hoo là là ça marche pas.");
            }
        }

        public function writeForms($enregistrements){
            for ($z = 1; $z <= count($enregistrements); $z++) {
                $x = $z-1;
                echo '<form action="choix.php">';
                echo '<input type="hidden" id="number" name="number" value='.$enregistrements[$x][0]. '>';
                echo '<label for="nomLieu">Nom du lieu</label>';
                echo '<input type="text" id="nomLieu" name="nomLieu" value='.$enregistrements[$x][2].' readonly>';
                echo '<label for="arrive">Date d\'arrivée</label>';
                echo '<input type="datetime-local" id="arrive" name="arrive" value='.$enregistrements[$x][7].' readonly>';
                echo '<label for="depart">Date de départ</label>';
                echo '<input type="datetime-local" id="depart" name="depart" value='.$enregistrements[$x][8].' readonly>';
                echo '<br>';
                echo '<input type="submit" value="J\'avais une pathologie contagieuse durant cette visite"/>';
                echo '</form>';
            }

        }
        
    }

    
?>