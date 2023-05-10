<!DOCTYPE html>
<html>
<head>
    <title>Vérification du code de récupération de mot de passe</title>
</head>
<body>
    <h1>Vérification du code de récupération de mot de passe</h1>
    <form method="POST" action="">
        <label for="code">Code de récupération :</label>
        <input type="text" id="code" name="code" required><br><br>
        <input type="submit" value="Vérifier le code">
    </form>
</body>
</html>

<?php
session_start();

// Vérification si l'utilisateur a soumis le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Récupération du code entré par l'utilisateur
    $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);

    // Vérification si le code est correct
    if ($_SESSION['code_recuperation'] === $code) {
        // Code correct, affichage du formulaire de réinitialisation de mot de passe
        
        header('Location: reinitialisation.php');
        
    } else {
        // Code incorrect, affichage d'un message d'erreur
        echo "Le code entré est incorrect.";
    }
} 

?>
