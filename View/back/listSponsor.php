<?php
    require '../../Controller/sponsorC.php';
	require 'adminHeader.php';
	require 'sidebar.php';
    $sponsorC = new sponsorC();
    $list = $sponsorC->listsponsor();
    //var_dump($list);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body>
<br>
<br>


			
    <?php
        echo "<table>";
        echo "<tr> <th>idd</th> <th>Nom sponsor</th><th>secteur activite</th> <th>Date debut</th> <th>Date fin</th> <th>Prix</th> <th>Description</th> <th>Image</th> <th>Id organisateur</th> <th>Delete</th> <th>Update</th> </tr>";
        foreach ($list as $row){
            echo "<tr> <td>".$row['id']."</td> <td>".$row['nom']."</td><td>".$row['secteur_activite']."</td> <td>".$row['date_debut']."</td> <td>".$row ['date_fin']."</td> <td>".$row ['montant_sponsoring']."</td>  <td>".$row ['description_sponsorship']."</td>  <td><img src='img/".$row['logo_sponsor']."' height='100' alt='".$row['logo_sponsor']."'></td><td>".$row['id_event']."</td> <td> <a href='deleteSponsor.php?id=".$row['id']."'>Delete</a> </td> <td> <a href='updateSponsor.php?id=".$row['id']."'>Update</a> </td> </tr>";
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
	
    <a href="createSponsor.php">
        <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
            Add SPONSOR
        </button>
    </a>
    <br><br><br>

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
