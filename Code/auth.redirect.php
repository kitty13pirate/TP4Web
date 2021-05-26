<?php

if (!isset($_POST['nom'],$_POST['mdp'])){
    //Le formulaire ne contient pas ces champs.
    //Ceci peut arriver en cas d'attaque.

    setcookie("erreurAuth", "Refus de traitement.", 0, "/", "rail.techinfo420.ca", true, true);
    header("Location: index.php");
    //echo "refus de traitement";
    
} else if (empty($_POST['nom']) || empty($_POST['mdp'])){
    //Les champs sont obligatoires dans le formulaire.
    //Il faut valider sur le backend aussi.
    setcookie("erreurAuth", "Il manque des informations pour l'authentification", 0, "/", "rail.techinfo420.ca", true, true);
    header("Location: index.php");
    //echo "Il manque des informations";
    
} else {
    //Toutes les exigences sont atteintes, on peut vérifier 
    //l'authentification.

    require_once './Authentifier.static.php';

    //Les valeurs provenant de l'extérieur du serveur doivent
    //être considérées dangereuses et être alors soit filtrées ou validées.
    $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS);
    $mdp = filter_input(INPUT_POST,'mdp',FILTER_DEFAULT);

    //Utilisation de la classe statique.
    if (Authentifier::getAuthentification($nom,$mdp)){
        /**
         * L'authentification est acceptée.
         */
        //echo "C'est ok";
        require_once 'auth.session.php';
        setSession($nom);
        header("Location: choix.php");
    } else {
        /**
         * L'authentification est refusée.
         */
        setcookie("erreurAuth", "Votre identifiant n'est pas valide", 0, "/", "rail.techinfo420.ca", true, true);
        header("Location: index.php");
        //echo "Interdit";
    }
}
