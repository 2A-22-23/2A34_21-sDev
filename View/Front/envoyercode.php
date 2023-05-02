<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Back/PHPMailer-master/src/Exception.php';
require '../Back/PHPMailer-master/src/PHPMailer.php';
require '../Back/PHPMailer-master/src/SMTP.php';

// Démarrer la session
session_start();

// Récupérer l'adresse e-mail de l'utilisateur
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Vérifier si l'adresse e-mail est valide
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'L\'adresse e-mail est invalide.';
    exit;
}

// Générer un code de récupération aléatoire
$code = substr(md5(rand()), 0, 6);

// Sauvegarder le code de récupération en session
$_SESSION['code_recuperation'] = $code;
$_SESSION['email'] = $email;

// Configuration de PHPMailer
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sbouiwael09@gmail.com'; // Remplacer par votre adresse e-mail
$mail->Password = 'whmqshofzwxhefgf'; // Remplacer par votre mot de passe
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// Destinataire et objet du mail
$mail->setFrom('sbouiwael09@gmail.com', 'Mot de passe oublié');
$mail->addAddress($email);
$mail->Subject = 'Code de récupération de mot de passe';
$mail->Body = "Votre code de récupération de mot de passe est : $code";

// Envoyer le message
try {
    $mail->send();
    header("Location: verification_code.php");
    exit;
} catch (Exception $e) {
    echo 'Une erreur est survenue lors de l\'envoi du message : ' . $mail->ErrorInfo;
    exit;
}
?>
