<?php
require '../../Controller/clubC.php';
require '../../Controller/salleC.php';
require 'adminHeader.php';
require 'sidebar.php';


$clubC = new clubC();

if (isset($_GET["tri"])) {
    $club = $clubC->trierClubParNom();
}




if (isset ($_POST["Search1"]) && !empty ($_POST["Search"])) {
  $club = $clubC->rechercheClub($_POST["Search"]);
} else
  $club = $clubC->afficherclub();



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
        echo "<tr> <th>Nom</th> <th>Type</th> <th>Fondateur</th> <th>Date de création</th> <th>Actions</th> ";
        foreach ($club as $club){
            echo "<tr> <td>".$club['titre']."</td> <td>".$club['type']."</td> <td>".$club['fondateur']."</td> <td>".$club['date']."</td> <td>   <td> <a href='dsupprimerclubadmin.php?id=".$club['idclub']."'>Delete</a> </td> <td> <a href='modifierclubadmin.php?id=".$club['idclub']."'>Update</a> </tr>";
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
	
    <a href="ajouterclubadmin.php">
        <button type="button" class="btn btn-secondary" style="height:40px;">
            Add club
        </button>
    </a>
    <a href="tri.php">
        <button type="button" class="btn btn-secondary" style="height:40px;">
            Tri club with name
        </button>
    </a>

    <button onclick="window.print();" class="btn btn-primary" id="print-btn" class="btn btn-secondary" style="height:40px;">Print</button>
    <br><br><br>

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
