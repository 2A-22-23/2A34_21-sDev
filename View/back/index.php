<?php

session_start (); 
if (!isset($_SESSION['token']) || $_SESSION['token'] !== $_GET['token']) {
  header('Location: ../Front/connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >
    
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
            require_once '../../config.php';
        ?>

    <div id="main-content" class="container allContent-section py-4">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="chart"></canvas>
    <?php
            $sql = "SELECT COUNT(idQuestion) AS nb_questions, YEAR(date_publication) AS annee, MONTH(date_publication) AS mois FROM questions GROUP BY YEAR(date_publication), MONTH(date_publication)";
            $pdo = config::getConnexion();
            // Exécution de la requête
            $resultat = $pdo->query($sql);

            // Initialisation des données pour le graphe
            $labels = [];
            $data = [];

            // Récupération des données de la requête
            while ($donnees = $resultat->fetch()) {
                $labels[] = $donnees['mois'] . "/" . $donnees['annee'];
                $data[] = $donnees['nb_questions'];
            }

            // Fermeture de la connexion à la base de données
            $bdd = null;

            ?>

            <script>
            // Création du graphe
            var ctx = document.getElementById('chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Nombre de questions publiées par mois',
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>

        
    </div>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>