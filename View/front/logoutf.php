<?php
require_once '../../Config.php';

session_start();

if(isset($_SESSION['tokene'])) {

    $db = Config::getConnexion();
    $email = $_SESSION['email'];
    $sql = "UPDATE users SET token=NULL, tokenE=NULL, tokenP=NULL WHERE email=:email";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
    session_destroy();

    // Remove the token from the session and redirect to the front page
    unset($_SESSION['tokene']);
    header('Location:index.php');
    exit();
} else {
    // No user is logged in, redirect to the front page
    header('Location: index.php');
    exit();
}

?>
