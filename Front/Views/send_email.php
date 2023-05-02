<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// create PHPMailer object
$mail = new PHPMailer(true);

try {
  // enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;

  // set SMTP credentials
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'testrapide45@gmail.com'; // your Gmail account email
  $mail->Password = 'vtvtceruhzparthg'; // your Gmail account password
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // set email data
  $mail->setFrom('testrapide45@gmail.com', 'YouthSpace'); // sender address
  $mail->addAddress('meriem.mghirbi@esprit.tn'); // recipient address
  $mail->isHTML(true);
$mail->ContentType = 'text/html';
  $mail->Subject = 'Commande'; // subject line
  $mail->Body = '<html>
  <body>
    <p>Bonjour,</p>
    <p>Nous tenons à vous informer que nous avons bien reçu votre commande et nous vous en remercions.</p>
    <p>Nous sommes en train de traiter votre commande et nous vous enverrons un e-mail de confirmation une fois qu elle aura été expédiée.</p>
    <p>Si vous avez des questions ou des préoccupations concernant votre commande, n\'hésitez pas à nous contacter.</p>
    <p>Cordialement,</p>
    <p>L\'équipe Youthspace</p>
  </body>
</html>';
// plain text body

  // send email
  $mail->send();
  echo 'Email sent';
} catch (Exception $e) {
  echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}
?>
