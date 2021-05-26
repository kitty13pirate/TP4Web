<?php
require_once 'data/Connexion.abstract.php';
require_once 'data/ConnexionAuthentification.classe.php';
require_once 'auth.session.php';
    
    if (getSessionExiste()){
        $Utilisateur = $_SESSION['infoAuth'];

    }
    echo $Utilisateur;

    class classeDonnee{
        public function getDonneesMySQL(){
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

                var_dump($enregistrements[0]);
                var_dump($enregistrements[0][2]);
                    
            } catch (Exception $e) {
                //error_log permet d'écrire dans le log d'erreur php.
                error_log("Exception pdo: ".$e->getMessage());
                        
                //Dans ce cas-ci la gestion d'erreur prévoit une page d'information.
                header("Location: info.php?message=Hoo là là ça marche pas.");
            }
        }

        
    }

    
?>