<?php
require_once 'data/Connexion.abstract.php';
require_once 'data/ConnexionAuthentification.classe.php';
require_once 'auth.session.php';
    
    if (getSessionExiste()){
        $Utilisateur = $_SESSION['infoAuth'];

    }
$nomLieu = filter_input(INPUT_POST,'nomLieu',FILTER_SANITIZE_SPECIAL_CHARS);
$numeroCivique = filter_input(INPUT_POST,'numeroCivique',FILTER_SANITIZE_SPECIAL_CHARS);
$rue = filter_input(INPUT_POST,'rue',FILTER_SANITIZE_SPECIAL_CHARS);
$ville = filter_input(INPUT_POST,'ville',FILTER_SANITIZE_SPECIAL_CHARS);
$Provinces = filter_input(INPUT_POST,'Provinces',FILTER_SANITIZE_SPECIAL_CHARS);
$arrive = filter_input(INPUT_POST,'arrive',FILTER_SANITIZE_SPECIAL_CHARS);
$depart = filter_input(INPUT_POST,'depart',FILTER_SANITIZE_SPECIAL_CHARS);
error_log($Utilisateur);
error_log($nomLieu);
error_log($numeroCivique);
error_log($rue);
error_log($ville);
error_log($Provinces);
error_log($arrive);
error_log($depart);
        
$cd = new ConnexionAuthentification();
$maConnexionPDO = $cd->getConnexion();
$pdoRequete = $maConnexionPDO->prepare("INSERT INTO `railwil_TP4`.`Visite` (`Utilisateur`, `NomLieu`, `numeroCivique`, `rue`, `ville`, `province`, `arriveDate`, `departDate`) VALUES (:Utilisateur, :nomLieu, :numeroCivique, :rue, :ville, :Provinces, :arrive, :depart);");
$pdoRequete->bindParam(":Utilisateur",$Utilisateur,PDO::PARAM_STR);
$pdoRequete->bindParam(":nomLieu",$nomLieu,PDO::PARAM_STR);           
$pdoRequete->bindParam(":numeroCivique",$numeroCivique,PDO::PARAM_STR);
$pdoRequete->bindParam(":rue",$rue,PDO::PARAM_STR);
$pdoRequete->bindParam(":ville",$ville,PDO::PARAM_STR);
$pdoRequete->bindParam(":Provinces",$Provinces,PDO::PARAM_STR);
$pdoRequete->bindParam(":arrive",$arrive,PDO::PARAM_STR);
$pdoRequete->bindParam(":depart",$depart,PDO::PARAM_STR);
$pdoRequete->execute();

header("Location: choix.php")
            
?>