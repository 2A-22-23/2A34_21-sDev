<?php
require_once '../../model/event.php';
require_once '../../controller/eventC.php';
require 'adminHeader.php';
require 'sidebar.php';

if (isset($_GET["id"])) {
  $eventC = new eventC();
  $list = $eventC->findevent($_GET["id"]);
  $list1=$eventC->findEvent_array($_GET["id"]);
  //var_dump($list);
  
  if (isset($_POST["id_org"], $_POST["nom"], $_POST["date_debut"], $_POST["date_fin"], $_POST["prix"], $_POST["description"])) {
    $id_org = $_POST["id_org"];
        $nom = $_POST["nom"];
        $date_debut = $_POST["date_debut"];
        $date_fin = $_POST["date_fin"];
        $prix = $_POST["prix"];
        $description = $_POST["description"];

    // Check if any required field is empty
    if (!!empty($id_org) && !empty($nom) && !empty($date_debut) && !empty($date_fin) && !empty($prix) && !empty($description)) {
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
            $event = new event($_POST["id_org"],$_GET["id"],$_POST["nom"], $_POST["date_debut"], $_POST["date_fin"], $_POST["prix"], $_POST["description"], $filename);
            $eventC->updateEvent($event,$_POST["id"]); // pass $_GET["id"] as the second argument
            header('location:listEvent.php');
          
         }} else {
            echo "Failed to upload file.";
          }
        } else {
          echo "Invalid file extension.";
        }
      } else {
        
        
          $event = new event($_POST["id_org"], $_GET["id"],$_POST["nom"], $_POST["date_debut"], $_POST["date_fin"], $_POST["prix"], $_POST["description"], $list->getImage());
            $eventC->updateEvent($event,$_POST["id"]);
            // pass $_GET["id"] as the second argument
        header('location:listEvent.php');
      }}
     else {
      echo "Please fill all required fields.";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="create.js"></script>
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
  <label for="id_org">Organization ID:</label>
  <input type="text" id="id_org" name="id_org" value="<?php echo $list->getorganizer(); ?>" class="input" oninput="validateInput('id_org', /^\d{4}$/)"><br>
  <span id="id_org_span"></span>
</div>

<div class="input_field">
  <label for="nom">Name:</label>
  <input type="text" id="nom" name="nom" value="<?php echo $list->get_name_event(); ?>"class="input" oninput="validateInput('nom', /^[a-zA-Z]+$/)" ><br>
  <span id="nom_span"></span>
</div>
<div class="input_field">
  <label for="date_debut">Start Date:</label>
  <input type="date" id="date_debut" name="date_debut" value="<?php echo $list->getdate_debut(); ?>"><br>
</div>
<div class="input_field">
  <label for="date_fin">End Date:</label>
  <input type="date" id="date_fin" name="date_fin" value="<?php echo $list->getdate_fin(); ?>"><br>
</div>
<div class="input_field">
  <label for="prix">Price:</label>
  <input type="text" id="prix" name="prix" value="<?php echo $list->getprix(); ?>" class="input" oninput="validateInput('prix', /^\d+(\.\d{1,2})?$/)"><br>
  <span id="prix_span"></span>
</div>
<div class="input_field">
  <label for="description">Description:</label>
  <textarea id="description" name="description"><?php echo $list->getDescrip(); ?></textarea><br>
</div>
<div class="input_field">
  <label for="image">Image:</label>
  <input type="file" id="image" name="image"><br>
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
<script>
    function validateInput(inputId, regex) {
      const input = document.getElementById(inputId);
      const span = document.getElementById(`${inputId}_span`);

      if (regex.test(input.value)) {
        span.innerText = 'Correct';
        span.style.color = 'green';
      } else {
        span.innerText = 'Incorrect';
        span.style.color = 'red';
      }
    }
  </script>

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>