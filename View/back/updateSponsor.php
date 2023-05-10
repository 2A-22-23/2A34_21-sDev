<?php
require_once '../../model/sponsor.php';
require_once '../../controller/sponsorC.php';
require 'adminHeader.php';
require 'sidebar.php';

if (isset($_GET["id"])) {
  $sponsorC = new sponsorC();
  $list = $sponsorC->findsponsor($_GET["id"]);
  //var_dump($list);
  foreach($list as $row)
  if (isset($_POST["id"], $_POST["nom"], $_POST["secteur_activite"], $_POST["date_debut"], $_POST["date_fin"], $_POST["montant_sponsoring"], $_POST["description_sponsorship"],$_POST["id_event"])) {
    $id = $_POST["id"];
    $id_event = $_POST["id_event"];
    $nom = $_POST["nom"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $prix = $_POST["montant_sponsoring"];
    $description = $_POST["description_sponsorship"];

    // Check if any required field is empty
    if (!empty($_POST["id"]) && !empty($_POST["nom"]) && !empty($_POST["secteur_activite"]) && !empty($_POST["date_debut"]) && !empty($_POST["date_fin"]) && !empty($_POST["montant_sponsoring"]) && !empty($_POST["description_sponsorship"])&&!empty($_POST["id_event"])) {
      $filename = null;
      if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $filename = $_FILES['image']['name'];
        $target_file = 'img/' . $filename;
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        $valid_extension = array("png", "jpeg", "jpg");

        // Check if file has a valid extension
        if (in_array($file_extension, $valid_extension)) {
          // Move uploaded file to target directory
          if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sponsor = new sponsor($_POST["id"], $_POST["nom"], $_POST["secteur_activite"], $_POST["date_debut"], $_POST["date_fin"], $_POST["montant_sponsoring"], $_POST["description_sponsorship"],$_POST["id_event"], $filename);
            $sponsorC->updatesponsor($sponsor, $_POST["id"]); // pass $_GET["id"] as the second argument
            header('location:listSponsor.php');
          } else {
            echo "Failed to upload file.";
          }
        } else {
          echo "Invalid file extension.";
        }
      } else {
            $sponsor = new sponsor($_POST["id"], $_POST["nom"], $_POST["secteur_activite"], $_POST["date_debut"], $_POST["date_fin"], $_POST["montant_sponsoring"], $_POST["description_sponsorship"],$_POST["id_event"], $row["image"]);
            $sponsorC->updatesponsor($sponsor,$_POST["id"]);
            var_dump($sponsorC); // pass $_GET["id"] as the second argument
        header('location:listSponsor.php');
      }
    } else {
      echo "Please fill all required fields.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
</head>
<body>
   
<form action="" method="POST" enctype="multipart/form-data">
<div class="wrapper">
      <div class="title">
        Add form
      </div>
<!-- include the id parameter in the form's action and add enctype for file upload -->
<div class="input_field">
  <label for="id">SPONSOR ID:</label>
  <input type="text" id="id" name="id" value="<?php echo $list->getId(); ?>"><br><br>
</div>
<div class="input_field">
  <label for="nom">Sponsor Name :</label>
  <input type="text" id="nom" name="nom" value="<?php echo $list->getNom(); ?>"><br><br>
</div>
<div class="input_field">
  <label for="secteur_activite">secteur activité:</label>
  <input type="text" id="secteur_activite" name="secteur_activite" value="<?php echo $list->getSecteurActivite(); ?>"><br><br>
</div>
<div class="input_field">
  <label for="date_debut">Start Date:</label>
  <input type="date" id="date_debut" name="date_debut" value="<?php echo $list->getDateDebut(); ?>"><br><br>
</div>
<div class="input_field">
  <label for="date_fin">End Date:</label>
  <input type="date" id="date_fin" name="date_fin" value="<?php echo $list->getDateFin(); ?>"><br><br>
</div>
<div class="input_field">
  <label for="montant_sponsoring">Price:</label>
  <input type="text" id="montant_sponsoring" name="montant_sponsoring" value="<?php echo $list->getMontantSponsoring(); ?>"><br><br>
</div>
<div class="input_field">
  <label for="description_sponsorship">Description:</label>
  <textarea id="description_sponsorship" name="description_sponsorship"><?php echo $list->getDescriptionSponsorship(); ?></textarea><br><br>
</div>
<div class="input_field">
  <label for="id_event">identifiant d'evenement:</label>
  <input type="text" id="id_event" name="id_event" value="<?php echo $list->getIdEvent(); ?>"><br><br>
</div>
<div class="input_field">
  <label for="image">Image:</label>
  <input type="file" id="image" name="image"><br><br>
</div>
<div class="input_field">
  <input type="submit" value="Update">
</div>
</div>
</form>
<style>


    /* Global styles */

body {
  background-color: black;
  color: white;
  font-family: Arial, sans-serif;
  font-size: 16px;
}

a {
  color: yellow;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

/* Form styles */

.wrapper {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #333;
  border-radius: 10px;
}

.title {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.form {
  display: flex;
  flex-direction: column;
}

.input_field {
  margin-bottom: 15px;
  color: white;
}

.label {
  font-size: 18px;
  margin-bottom: 5px;
  color: white;
}

.input {
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #555;
  color: white;
}

.textarea {
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #555;
  color: white;
  resize: vertical;
  height: 100px;
}

.button {
  padding: 10px;
  background-color: yellow;
  color: black;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.button:hover {
  background-color: #ff0;
}

</style>



<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>