<?php

require_once './data/ConnexionAuthentification.classe.php';

/**
 * Description de Authentification
 * Classe de récupération des crédentiels d'un usager.
 * @author Claude
 */
abstract class Authentification {
    protected $pwd;
    protected $userExist;
    protected $pdo;
    protected $connexion;
    
    /**
     * Retourne le password.
     */
    public function getPwd(){
        return $this->pwd;
    }

    /**
     * Retourne 0 ou 1 sur l'existence du nom d'usager dans la Bd.
     */
    public function getUserExiste(){
        return $this->userExist;
    }

    /**
     * Après le passage du constructeur, les infos fournies sont utilisées
     * pour établir l'existance de l'utilisateur dans la bd et le cas échéant,
     * la récupération du mot de passe de la bd.
     */
    public function setCredentiel($user,$mdp){
        try {
            $this->setUserExiste($user);

            if ($this->userExist){
                $this->selectPwdByUser($user);
            } else{
                $this->pwd = 0;
            }
        } 
        catch (Exception $e){
            error_log($e->getMessage());
        }        
    }

    /**
     * Si le nom d'usager existe le mot de passe est récupéré de la Bd
     * et placé dans la variable de classe $pwd.
     */
    protected function selectPwdByUser($user)
    {
        try {
            $this->pdo = $this->connexion->prepare("select MDP from utilisateur where utilisateur=:user");
            $this->pdo->bindParam(":user",$user,PDO::PARAM_STR,255);
    
            //La requête complétée, avec une valeur sur la variable, est passée au
            // serveur de bd, sur le schéma.
            $this->pdo->execute();
            $this->pwd = $this->pdo->fetch()[0];

        } catch (Exception $e){
            error_log($e->getMessage());
        }
    }

    /**
     * Valide la présence dans la Bd du nom d'usager fourni par l'utilisateur.
     */
    protected function setUserExiste($user)
    {
        try {
            $this->pdo = $this->connexion->prepare("select count(utilisateur) from utilisateur where utilisateur=:user");
            $this->pdo->bindParam(":user",$user,PDO::PARAM_STR,255);

            $this->pdo->execute();//Sera 0 ou 1 occurence de ce user.
            
            $this->userExist = $this->pdo->fetch()[0];

        } catch (Exception $e){
            error_log($e->getMessage());
        }
    }    
}