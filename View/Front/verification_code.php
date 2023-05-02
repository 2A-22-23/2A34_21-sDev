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
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Réinitialisation de mot de passe</title>
        </head>
        <body>
            <h1>Réinitialisation de mot de passe</h1>
            <form method="POST" action="changer_mot_de_passe.php">
                <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
                <input type="password" id="nouveau_mot_de_passe" name="nouveau_mot_de_passe" required><br><br>
                <label for="confirmer_mot_de_passe">Confirmer le nouveau mot de passe :</label>
                <input type="password" id="confirmer_mot_de_passe" name="confirmer_mot_de_passe" required><br><br>
                <input type="submit" value="Réinitialiser le mot de passe">
            </form>
        </body>
        </html>
        <?php
    } else {
        // Code incorrect, affichage d'un message d'erreur
        echo "Le code entré est incorrect.";
    }
} 

?>
