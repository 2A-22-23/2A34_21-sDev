<?php
require_once '../../Config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Recherche de l'utilisateur dans la base de données
	$db = Database::getConnexion();
	$sql = "SELECT * FROM users WHERE email= :email";
	try {
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
        

		// Vérification du mot de passe
		if ($user && $password==$user['mdp'] && $user['roleu']==11) {
			// L'utilisateur est authentifié, vous pouvez rediriger l'utilisateur vers une page de profil ou une page d'accueil sécurisée.
			header('Location: ../../../../../YouthSpace/View/Back/RoleView.php');
			exit();
		} else {
			// Les informations d'identification sont incorrectes, affichez un message d'erreur.
			echo 'Adresse e-mail ou mot de passe incorrect.';
		}
	} catch (Exception $e) {
		die('Erreur: ' . $e->getMessage());
	}
}
?>