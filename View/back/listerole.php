<?php

session_start();


include_once "../../Controller/RoleC.php";
$Role2C=new RoleC();
$listeRole2=$Role2C->AfficherRoless() ;
$Role1C=new RoleC();
$listeRole=$Role1C->AfficherRoles() ;
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
   <!-- hne -->
   <div class="container" data-aos="fade-up">
    <h2>Liste des rôles</h2>
<div class="table-responsive">
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($listeRole as $row) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['roles']; ?></td>
        <td>
          <a href="modifR.php?id=<?php echo $row['id']; ?>">
            <img src="./assets/img/pencill.png" alt="Modifier" title="Modifier">
          </a>
          <form method="POST" action="deleteR.php" style="display:inline-block;">
            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
            <button type="submit" name="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')" style="background:none; border:none; padding:0; margin:0;">
              <img src="./assets/img/trash.png" alt="Supprimer" title="Supprimer">
            </button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<button id="add-event" class="btn btn-primary">
    <a href="add.php" style="color: white;">Ajouter un rôle</a>
  </button>

  <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>