<?php
require_once 'Authentification.abstract.php';
require_once './data/ConnexionAuthentification.classe.php';

/**
 * Classe de récupération des infos d'authentification présentes
 * dans la Bd.
 * @author Claude
 */
class GetAuth extends Authentification {

    public function __construct()
    {
        try {
            $cd = new ConnexionAuthentification();
            $this->connexion = $cd->getConnexion();
        } 
        catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}