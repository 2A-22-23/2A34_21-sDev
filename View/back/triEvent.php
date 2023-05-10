<?php
    require '../../Controller/eventC.php';
    require 'adminHeader.php';
    require 'sidebar.php';
    $eventC = new eventC();
    $list = $eventC->triEvent();
    
  

    
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
<br>
<form method="post">
<label for="search">Search:</label>
<input type="text" id="id" name="id" style="padding: 10px; border-radius: 4px; border: 1px solid #ccc; box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075); transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;">
<input type="submit" value="Search">
</form>
			
    <?php
        echo "<table>";
        echo "<tr> <th>ID event</th> <th>Nom</th> <th>Date debut</th> <th>Date fin</th> <th>Prix</th> <th>Description</th><th>Id organisateur</th> <th>Image</th>  <th>Delete</th> <th>Update</th> </tr>";
        foreach ($list as $row){
            echo "<tr> <td>".$row->getId()."</td> <td>".$row->get_name_event()."</td> <td>".$row->getdate_debut()."</td> <td>".$row->getdate_fin()."</td> <td>".$row->getprix()."</td>  <td>".$row->getDescrip()."</td> <td>".$row->getorganizer()."</td>  <td><img src='img/".$row->getImage()."' height='100' alt='".$row->getImage()."'></td> <td> <a href='deleteEvent.php?id=".$row->getId()."'>Delete</a> </td> <td> <a href='update.php?id=".$row->getId()."'>Update</a> </td> </tr>";
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
	
    <a href="createEvent.php">
        <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
            Add Event
        </button>
    </a>
    <a href="triEvent.php">
        <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
           tri Event with price
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