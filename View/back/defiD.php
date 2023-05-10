<?php
require_once('md.php');
$model = new Model();

// Sorting functionality
if (isset($_POST['sort_column'], $_POST['sort_order'])) {
    $column = $_POST['sort_column'];
    $order = $_POST['sort_order'];
    $searchResults = $model->sort($column, $order);
} else {
    $searchResults = $model->fetch();
    $stats = $model->getStatsByGame();

}

// Search functionality
if (isset($_POST['q'])) {
    $searchTerm = $_POST['q'];
    $searchResults = $model->search($searchTerm);
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
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
  </head>
</head>
<body >
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
            ?>


        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Defi</h2>
                    </div>
                </div>
                <div>
                    <div class="col-md-6">
                        <h5>Table des Defi</h5>
                        <!-- Form for sorting -->
                        <form method="POST" action="defid.php" class="form-inline">
                            <div class="form-group">
                                <label for="sort_column">Trier par colonne :</label>
                                <select class="form-control" name="sort_column" id="sort_column">
                                    <option value="j2">J2</option>
                                    <option value="datess">Date</option>
                                    <option value="jeu">Jeu</option>
                                    <option value="recompance">Récompense</option>
                                    <option value="detail">Détail</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sort_order">Ordre de tri :</label>
                                <select class="form-control" name="sort_order" id="sort_order">
                                    <option value="ASC">Croissant</option>
                                    <option value="DESC">Décroissant</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Trier</button>
                        </form>
                        <br>

                        <!-- Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>N</th>
                                    <th>J2</th>
                                    <th>Date</th>
                                    <th>Jeu</th>
                                    <th>Récompense</th>
                                    <th>Détail</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($searchResults)) : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($searchResults as $row) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['j2']; ?></td>
                                            <td><?php echo $row['datess']; ?></td>
                                            <td><?php echo $row['jeu']; ?></td>
                                            <td><?
                                            echo $row['recompance']; ?></td>
                                            <td><?php echo $row['detail']; ?></td>
                                            <td>
                                                <!-- Add your actions for each search result here -->
                                                <a href="deleteD.php?j2=<?php echo $row['j2']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce défi ?');">Supprimer</a>
                                                <a href="editD.php?j2=<?php echo $row['j2']; ?>">Modifier</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="7">Aucun résultat trouvé.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- Search form -->
                        <form method="POST" action="defid.php">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="Rechercher un défi..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Rechercher</button>
                                </span>
                            </div>
                        </form>
                        <div class="row">
    <div class="col-md-6">
        <h5>Statistiques par Jeu</h5>
        <canvas id="stat-chart"></canvas>
    </div>
</div>

                        <!-- Additional form fields or buttons if needed -->

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
    <?php
        // Convertir les statistiques PHP en format JSON pour le traitement en JavaScript
        $statsJSON = json_encode($stats);
    ?>
    // Récupérer les statistiques JSON dans une variable JavaScript
    var statsData = <?php echo $statsJSON; ?>;

    // Récupérer les jeux et les nombres correspondants
    var games = Object.keys(statsData);
    var counts = Object.values(statsData);

    // Créer un tableau de couleurs pour les sections du graphique
    var colors = ['#FF6384', '#36A2EB', '#FFCE56', '#8C14FC', '#00FF00'];

    // Créer les données du graphique en utilisant les jeux et les nombres
    var chartData = {
        labels: games,
        datasets: [{
            data: counts,
            backgroundColor: colors
        }]
    };

    // Obtenir le contexte du canvas pour le graphique
    var ctx = document.getElementById('stat-chart').getContext('2d');

    // Créer le graphique en utilisant Chart.js
    var statChart = new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: {
            responsive: true,
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var total = dataset.data.reduce(function(previousValue, currentValue) {
                            return previousValue + currentValue;
                        });
                        var currentValue = dataset.data[tooltipItem.index];
                        var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                        return games[tooltipItem.index] + ': ' + percentage + '%';
                    }
                }
            }
        }
    });
</script>

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
