<?php
require_once '../../model/event.php';
require_once '../../controller/eventC.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

if (isset($_GET["id"])) {
    $eventC = new eventC();
    $event = $eventC->findevent($_GET["id"]);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bchirben8@gmail.com';
    $mail->Password = 'oeopsajyvhamngzz';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('bchirben8@gmail.com');
    $mail->addAddress('bechir.benslimene@esprit.tn');
    $mail->isHTML(true);
    $mail->Subject = 'Youth space Events';
    $mail->Body = 'http://localhost/crud/View/front/#get-started';
    //Vous avez participé à '.$event->get_name_event().' de '.$event->getdate_debut().' à '.$event->getdate_fin().'. Soyez prêt!';
    $mail->send();
    $mail->SMTPDebug = 2;
    echo "Mail envoyé";
}
?>
