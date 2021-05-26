<?php
/**
 * Classe statique.
 * Permet de vérifier la présence d'un compte pour l'authentification.
 * La classe utilise la couche data qui fait des requêtes
 * sur la Bd.
 */

class Authentifier {
    public static function getAuthentification($user, $mdp){

        require_once './data/GetAuth.classe.php';
        $authentifiant = new GetAuth();
        $authentifiant->setCredentiel($user, $mdp);

        if ($authentifiant->getUserExiste()){
            //Le nom existe alors vérifier le mdp.
            return password_verify($mdp,$authentifiant->getPwd());
        } else {
            return FALSE;
        }
    }


}