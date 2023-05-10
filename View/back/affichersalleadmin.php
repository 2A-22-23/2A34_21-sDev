<?php
require '../../Controller/salleC.php';
require 'adminHeader.php';
require 'sidebar.php';

$salleC = new salleC();

if (isset ($_GET["tri"]))  {
    $salle = $salleC->triSalle();
} 
else{
    $salle = $salleC->affichersalle();
}


if (isset ($_POST["Search1"]) && !empty ($_POST["Search"])) {
    $salle = $salleC->rechercheSalle($_POST["Search"]);
}

else
$salle = $salleC->affichersalle();



?>

<!DOCTYPE html>
<html lang="en">
    <head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="View/css/font-face.css" rel="stylesheet" media="all">
    <link href="View/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="View/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="View/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="View/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="View/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="View/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="View/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="View/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="View/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="View/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="View/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="jscript/graph.js"></script>


    <!-- Main CSS-->
    <link href="View/css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
  </head>
</head>
<body>
<br>
<br>
<br>


<form method="post">
<label for="search">Search:</label>
<input type="text" id="id" name="Search" style="padding: 10px; border-radius: 4px; border: 1px solid #ccc; box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075); transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;">
<input type="submit" value="Search" name="Search1">
</form>
			
			
    <?php
        echo "<table>";
        echo "<tr> <th>Bloc</th> <th>Numero</th> <th>etage</th> <th>club</th> <th>Actions</th>   <th>Delete</th> <th>Update</th> </tr>";
        foreach ($salle as $salle){
            include_once '../../Controller/clubC.php';
            
            $clubC = new clubC();
            
                $clubId = $salle['idclub'];
                $club = $clubC->getclubById($clubId);
                $clubTitle = $club['titre'];
            echo "<tr> <td>".$salle['bloc']."</td> <td>".$salle['numero']."</td> <td>".$salle['etage']."</td> <td>". $clubTitle."</td> <td> <a href='supprimersalleadmin.php?id=". $salle['idsalle']."'>Delete</a> </td> <td> <a href='modifiersalleadmin.php?id=". $salle['idsalle']."'>Update</a> </tr>";
        }
        echo "</table>";
        ?>
 <style>
      table {
        margin: 0 auto;
        text-align: center;
      }
    </style>
	<br><br><br>
	
    <a href="ajoutersalleadmin.php">
        <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
            Add salle
        </button>
    </a>
    <a href="tri2.php">
        <button type="button" name ="tri" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
           tri Event with name
        </button>
    </a>
    <button onclick="window.print();" class="btn btn-primary" id="print-btn" class="btn btn-secondary" style="height:40px;">Print</button>
    <br><br><br>
        <?php 
            $xValues = ["Nombre des clubs qui ont des salle", "Nombre des clubs sans salle"];
            $yValues = [$salleC->count_Salle(), $salleC->count_Club()-$salleC->count_Salle()];
            $barColors = ["#00aba9", "#e8c3b9"];
        ?>
        
        <div style="width: 500px; height: 300px; margin: 0 auto;">
            <canvas id="myChart"></canvas>
        </div>

    
        
        <script>
            var xValues = <?php echo json_encode($xValues); ?>;
            var yValues = <?php echo json_encode($yValues); ?>;
            var barColors = <?php echo json_encode($barColors); ?>;
        
            new Chart("myChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Club avec-Club sans"
                    }
                }
            });
        </script>


    <!-- Jquery JS-->
    <script src="View/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="View/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="View/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="View/vendor/slick/slick.min.js">
    </script>
    <script src="View/vendor/wow/wow.min.js"></script>
    <script src="View/vendor/animsition/animsition.min.js"></script>
    <script src="View/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="View/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="View/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="View/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="View/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="View/vendor/chartjs/Chart.bundle.min.js"></script>
    
    <script src="View/vendor/select2/select2.min.js">
    </script>
    <script src="View/js/main.js"></script>

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
