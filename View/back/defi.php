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
    <title>Defi</title>
    <!-- Add your CSS stylesheets and other head elements -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;Youth Space</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">See Website</a></li>
                        <li><a href="#">Open Ticket</a></li>
                        <li><a href="#">Report Bug</a></li>
                    </ul>
                </div>

            </div>
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive">
                     
                    </li>


                    <li>
                        <a href="indexD.php"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#">Notifications</a>
                            </li>
                            <li>
                                <a href="#">Elements</a>
                            </li>
                            <li>
                                <a href="#">Free Link</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="defid.php"><i class="fa fa-table "></i>Defi</a>
                    </li>
                    
                    <li>
                        <a href="chaine/page-2.php"><i class="fa fa-table "></i>chaine</a>
                    </li>
        </ul></div></nav>
    <div id="wrapper">
        <!-- Rest of your HTML code -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Defi</h2>
                    </div>
                </div>
                <div class="row">
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
                                                <a href="imprimerD.php?q=<?php echo $_POST['q']; ?>" class="btn btn-default" target="_blank">Imprimer</a>
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

</body>
</html>
