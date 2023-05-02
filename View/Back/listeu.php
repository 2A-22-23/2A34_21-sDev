<?php
require_once "../../Controller/UserC.php";
require_once "../../Modal/User.php";
require_once "../../Controller/RoleC.php";
require_once "../../Modal/Role.php";
require_once "../../Config.php";


if (isset($_GET['id'])) {
    $roleu = $_GET['id'];
    $UserC2 = new UserC();
    if (isset($_GET['sort-by']) && isset($_GET['sort-order']) ) {
        $sortBy = $_GET['sort-by'];
        $sortOrder = $_GET['sort-order'];
        // Récupérer la liste triée des utilisateurs
        $listeuser = $UserC2->afficheut($roleu, $sortBy, $sortOrder);
    } 
    else {
        // Si aucune option de tri n'a été soumise, afficher la liste des utilisateurs non triée
        $listeuser = $UserC2->afficheu($roleu);
    }
}



?>





<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<form action="listeu.php" method="get">
    <input type="hidden" name="id" value="<?php echo $roleu ?>">
    Trier par:
    <select name="sort-by">
        <option value="idu">ID</option>
        <option value="nom">Nom</option>
        <option value="prenom">Prénom</option>
        <option value="age">Age</option>
    </select>
    <select name="sort-order">
        <option value="asc">Croissant</option>
        <option value="desc">Décroissant</option>
    </select>
    <button class="stats-btn" type="submit">Trier</button>
    
</form>




    <title>Affichage utilisateur</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .delete-btn {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
        }
    </style>
</head>


<body>
    <h1>Liste des utilisateurs</h1>

   <?php 
    
    if(isset($listeuser)): ?>
        <table >
            <thead>
                <tr>
                    <th>IdUser</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Age</th>
                    <th>Sexe</th>
                    <th>Email</th>
                    <!-- <th>Rôle</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($listeuser as $user) : ?>
    <tr>
        <td><?php echo $user['idu']; ?></td>
        <td><?php echo $user['nom']; ?></td>
        <td><?php echo $user['prenom']; ?></td>
        <td><?php echo $user['age']; ?></td>
        <td><?php echo $user['sexe']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td>
            <form method="POST" action="deleteu.php?id=<?php echo $roleu; ?>" class="delete-form">
                <input type="hidden" value="<?php echo $user['idu']; ?>" name="idu">
                <button type="submit" name="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" class="delete-btn">
                    <img src="./assets/img/trash.png" alt="Supprimer" title="Supprimer">
                </button>
            </form>
            <!-- <form method="POST" action="pdf.php">
            <button type="submit" onclick="generatePdf(<?php echo $user['idu']; ?>)">
                <img src="./assets/img/pdf.png" alt="Supprimer" title="Supprimer">
            </button>
            </form> -->
            <?php if ($user['etat'] == 1) : ?>
                <form method="POST" action="bloqueru.php?id=<?php echo $roleu; ?>" class="ban-form">
                    <input type="hidden" value="<?php echo $user['idu']; ?>" name="idu">
                    <button type="submit" name="bloquer" onclick="return confirm('Êtes-vous sûr de vouloir bloquer cet utilisateur ?')" class="ban-btn">
                        Bloquer
                    </button>
                </form>
            <?php else : ?>
                <form method="POST" action="activeru.php?id=<?php echo $roleu; ?>" class="unban-form">
                    <input type="hidden" value="<?php echo $user['idu']; ?>" name="idu">
                    <button type="submit" name="activer" onclick="return confirm('Êtes-vous sûr de vouloir activer cet utilisateur ?')" class="unban-btn">
                        Activer
                    </button>
                </form>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>

                   
            </tbody>
        </table>
   
</form>
    <?php else: ?>
        <p>Aucun utilisateur à afficher pour ce rôle.</p>
    <?php endif; ?>
</body>
<script>
function generatePdf(idu) {
  // Envoie une requête AJAX pour générer le PDF
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'generate_pdf.php?id=' + idu, true);
  xhr.send();
}
</script>


<style>
button.stats-btn {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
<?php if(isset($listeuser)): ?>
    <button type="button" class="stats-btn" onclick="drawChart()">Afficher les statistiques</button>

    <div id="chart_div"></div>

    <script>
        google.charts.load('current', {'packages':['corechart']});

        function drawChart() {
            let ages = <?php echo json_encode(array_column($listeuser, 'age')); ?>;
            let stats = {'Moins de 18 ans': 0, '18-24 ans': 0, '25-34 ans': 0, '35-44 ans': 0, 'Plus de 44 ans': 0};
            ages.forEach(age => {
                if (age < 18) stats['Moins de 18 ans']++;
                else if (age < 25) stats['18-24 ans']++;
                else if (age < 35) stats['25-34 ans']++;
                else if (age < 45) stats['35-44 ans']++;
                else stats['Plus de 44 ans']++;
            });

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tranche d\'âge');
            data.addColumn('number', 'Nombre d\'utilisateurs');
            data.addRows([
                ['Moins de 18 ans', stats['Moins de 18 ans']],
                ['18-24 ans', stats['18-24 ans']],
                ['25-34 ans', stats['25-34 ans']],
                ['35-44 ans', stats['35-44 ans']],
                ['Plus de 44 ans', stats['Plus de 44 ans']]
            ]);

            var options = {'title':'Répartition des utilisateurs par tranche d\'âge',
                            'width':400,
                            'height':300};

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
<?php endif; ?>

</html>
