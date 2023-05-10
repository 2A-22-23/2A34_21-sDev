<?php
// Se connecter à la base de données
 $server = "localhost";
 $username = "root";
 $password = "";
 $db = "YS";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Fonction pour obtenir les statistiques par jeu
function getStatsByGame()
{
    global $conn;

    // Requête pour obtenir les statistiques par jeu
    $query = "SELECT jeu, COUNT(*) as count FROM defis GROUP BY jeu";
    $result = $conn->query($query);

    $stats = array();

    // Parcourir les résultats et stocker les statistiques
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $game = $row['jeu'];
            $count = $row['count'];
            $stats[$game] = $count;
        }
    }

    return $stats;
}

// Fermer la connexion à la base de données
$conn->close();
?>
