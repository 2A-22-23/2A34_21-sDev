<?php
require_once "../../Controller/UserC.php";

// Vérification des paramètres GET
if (isset($_GET['idu'], $_GET['tokenverif']) && $_GET['tokenverif'] != '') {
    $idu = $_GET['idu'];
    $tokenverif = $_GET['tokenverif'];
    
    $UserC = new UserC();
    
    // Vérification si le token de vérification de l'utilisateur correspond à celui stocké dans la base de données
    $user = $UserC->getUserById($idu);
    if ($user && $user['tokenverif'] === $tokenverif) {
        $UserC->unban($idu);
        $UserC->supprimertokenv($idu);
        header('Location: index.php');
    } else {
        // Le token de vérification est invalide
        echo 'Le lien d\'activation est invalide.';
    }
}    
?>
