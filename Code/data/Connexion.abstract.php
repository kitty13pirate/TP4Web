<?php
/**
 * Description de Connexion
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
abstract class Connexion {
    protected $connexion;
    
    abstract public function getConnexion();

    public function fermerConnexion(){
        try {
            $this->connexion = null;
        } catch (Exception $e){
            error_log($e->getMessage());
        }
        
    }
}