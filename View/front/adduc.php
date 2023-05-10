<?php
require '../../Model/User.php';
require '../../Controller/UserC.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['roleu'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $roleu = $_POST['roleu'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];
    $tokenverif= bin2hex(random_bytes(16));
    $User = new User($nom, $prenom, $age, $sexe, $email, $mdp, $roleu, 0, null, null, null,$tokenverif);
    
    $UserC = new UserC();
    $idu = $UserC->ajouteruser($User);

// Récupération de l'ID de l'utilisateur inséré
$idu = $UserC->getLastInsertId();
    // Configuration de PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sbouiwael09@gmail.com';
    $mail->Password = 'whmqshofzwxhefgf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinataire et objet du mail
    $mail->setFrom('sbouiwael09@gmail.com', 'Inscription utilisateur');
    $mail->addAddress($email);
    $mail->Subject = 'Confirmation d\'inscription';

    // URL de la page activercompte.php
    $activate_url = "http://localhost/crud/View/Front/activercompte.php?idu=$idu&tokenverif=$tokenverif";


    // Contenu du message
    $message = "<html><body>";
    $message .= "<p>Bonjour $nom,</p>";
    $message .= "<p>Votre inscription a été prise en compte.</p>";
    $message .= "<p>Voici les informations que vous avez saisies :</p>";
    $message .= "<ul>";
    $message .= "<li>Nom : $nom</li>";
    $message .= "<li>Prénom : $prenom</li>";
    $message .= "<li>Âge : $age</li>";
    $message .= "<li>Sexe : $sexe</li>";
    $message .= "<li>Email : $email</li>";
    $message .= "<li>Mot de passe : $mdp</li>";
    $message .= "<li>Rôle : $roleu</li>";
    $message .= "</ul>";
    $message .= "<p>Merci de votre inscription !</p>";
    $message .= '<form method="post" action="'.$activate_url.'"><button type="submit" style="background-color: #4CAF50; color: white; padding: 12px 20px; text-align: center; text-decoration: none; display: inline-block; border-radius: 4px;">Cliquez ici pour activer votre compte</button></form>';
    
    $mail->Body = $message;

    try {
        // Envoi du mail
        $mail->send();
        header ('location:index2.php');


        } catch (Exception $e) {
            echo "Une erreur est survenue : {$mail->ErrorInfo}";
        }
    

    // Move the uploaded file to the target directory

//     $UserC = new UserC();
//     $UserC->ajouteruser($User);
//     header('Location: index2.php');

//     // There was an error uploading the file
//     echo "Error uploading file.";
    
// } else {
//     echo "Verify all fields are filled";
// }
}
?> 
