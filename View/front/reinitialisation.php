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