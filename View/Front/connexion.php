<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
</head>
<body>
	<h1>Authentification</h1>
	<form method="POST" action="authentification.php">
		<label for="email">Adresse e-mail :</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="mdp">Mot de passe :</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Se connecter">
	</form>
	<div>
	<a href="mot_de_passe_oublie.php">Mot de passe oublié ?</a>
</div>
</body>
</html>