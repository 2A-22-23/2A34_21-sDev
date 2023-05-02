<?php
// Require composer autoloa
require_once(__DIR__ . '/mpdf-8.1.0/vendor/autoload.php');
require_once '../../Controller/UserC.php';

if (isset($_GET['id'])) {
    $idu = $_GET['id'];
    $UserC = new UserC();
    $user = $UserC->getUserById($idu);

    // Crée un nouvel objet mPDF
    $mpdf = new \Mpdf\Mpdf();

    // Génère le contenu HTML pour le PDF
    $html = '<h1>Données de l\'utilisateur ' . $user['nom'] . ' ' . $user['prenom'] . '</h1>';
    $html .= '<p>Age : ' . $user['age'] . '</p>';
    $html .= '<p>Sexe : ' . $user['sexe'] . '</p>';
    $html .= '<p>Email : ' . $user['email'] . '</p>';

    // Ajoute le contenu HTML au PDF
    $mpdf->WriteHTML($html);

    // Envoie le PDF au navigateur
    $mpdf->Output();
}
