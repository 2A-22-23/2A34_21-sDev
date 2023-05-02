<!DOCTYPE html>
<html>
<head>
	<title>Mot de passe oublié</title>
</head>
<body>
	<h1>Mot de passe oublié</h1>
	<p>Veuillez choisir la méthode de récupération de votre mot de passe :</p>
	<form method="POST" action="envoyercode.php">
		<input type="radio" id="par_email" name="methode_recuperation" value="email" checked>
		<label for="par_email">Par e-mail</label><br>
		<label for="email">Adresse e-mail :</label>
		<input type="email" id="email" name="email" ><br><br>
		<input type="radio" id="par_sms" name="methode_recuperation" value="sms">
		<label for="par_sms">Par SMS</label><br>
		<label for="telephone">Numéro de téléphone :</label>
		<input type="tel" id="telephone" name="telephone" ><br><br>
		<input type="submit" value="Envoyer le code">
	</form>
</body>
</html>
