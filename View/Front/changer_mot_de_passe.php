<?php
session_start();
require_once '../../Config.php';

// Vérification si l'utilisateur a soumis le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Récupération du nouveau mot de passe entré par l'utilisateur
    $nouveau_mot_de_passe = filter_input(INPUT_POST, 'nouveau_mot_de_passe', FILTER_SANITIZE_STRING);
    $confirmer_mot_de_passe = filter_input(INPUT_POST, 'confirmer_mot_de_passe', FILTER_SANITIZE_STRING);

    // Vérification si les mots de passe correspondent
    if ($nouveau_mot_de_passe === $confirmer_mot_de_passe) {
        
        // Récupération de l'email de l'utilisateur
        $email = $_SESSION['email'];
        
        // Enregistrement du nouveau mot de passe dans la base de données
        $sql = "UPDATE users SET mdp=:nouveau_mot_de_passe WHERE email=:email";
        $db = Database::getConnexion();
        
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':nouveau_mot_de_passe', $nouveau_mot_de_passe);
            $req->bindValue(':email', $email);
            $req->execute();
        
        } catch (Exception $o) {
            echo "Erreur ! " . $o->getMessage();
        }
        
        // Redirection vers la page de connexion
        header('Location: connexion.php');
        exit();
        
    } else {
        // Les mots de passe ne correspondent pas, affichage d'un message d'erreur
        $erreur = "Les mots de passe ne correspondent pas.";
    }
}
