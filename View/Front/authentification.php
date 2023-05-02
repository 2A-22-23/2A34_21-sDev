<?php
require_once '../../Config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Recherche de l'utilisateur dans la base de données
    $db = Database::getConnexion();
    $sql = "SELECT u.*, r.roles FROM users u JOIN roles r ON u.roleu = r.id WHERE u.email = :email";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $password == $user['mdp']) {
            if ($user['etat'] == 0) {
                // User account is banned, display error message
                echo 'Your account has been banned.';
            } else {
                $role = $user['roles'];
                $token = null;
                if ($role == 'admin') {
                    $tokenadmin = generateToken();
                    $user['Token'] = $tokenadmin;
                } elseif ($role == 'Enfant') {
                    $tokenenfant = generateToken();
                    $user['TokenE'] = $tokenenfant;
                } elseif ($role == 'Parent') {
                    $tokenparent = generateToken();
                    $user['TokenP'] = $tokenparent;
                }

                // Update user token in database
                $sql = "UPDATE users SET Token=:token, TokenE=:tokenE, TokenP=:tokenP WHERE email=:email";
                try {
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':token', $user['Token']);
                    $stmt->bindParam(':tokenE', $user['TokenE']);
                    $stmt->bindParam(':tokenP', $user['TokenP']);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                } catch (Exception $e) {
                    die('Erreur: ' . $e->getMessage());
                }

                if ($tokenadmin) {
                    // A token was generated, add it to the session and redirect to RoleView with token
                    session_start();
                    $_SESSION['token'] = $tokenadmin;
                    $_SESSION['email'] = $email;

                    $redirect_url = "../../../../../YouthSpace/View/Back/RoleView.php?token=".$tokenadmin;
                    header('Location: '.$redirect_url);
                    exit();
                } else {
                    // No token was generated, redirect to front view
                    header('Location: ../../../../../YouthSpace/View/Front/');
                    exit();
                }
            }
        } else {
            // Les informations d'identification sont incorrectes, affichez un message d'erreur.
            echo 'Adresse e-mail ou mot de passe incorrect.';
        }
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function generateToken() {
    $token = '';
    $characters = '0123456789';
    $num_characters = strlen($characters);

    for ($i = 0; $i < 10; $i++) {
        $token .= $characters[rand(0, $num_characters - 1)];
    }

    return $token;
}
