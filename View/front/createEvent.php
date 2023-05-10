<?php
    // Set error reporting to catch mysqli errors
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Include necessary files
    require_once '../model/event.php';
    require_once '../controller/eventC.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if all required fields are set and not empty
        if (isset($_POST["id_org"], $_POST["id_event"], $_POST["nom"], $_POST["date_debut"], $_POST["date_fin"], $_POST["prix"], $_POST["description"]) && !empty($_POST["id_org"]) && !empty($_POST["id_event"]) && !empty($_POST["nom"]) && !empty($_POST["date_debut"]) && !empty($_POST["date_fin"]) && !empty($_POST["prix"]) && !empty($_POST["description"])) {
            
            // Check if image file is uploaded
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
                        // Create new event object and save to database
                        $event = new event($_POST["id_org"], $_POST["id_event"], $_POST["nom"], $_POST["date_debut"], $_POST["date_fin"], $_POST["prix"], $_POST["description"], $filename);
                        $eventC = new eventC();
                        $eventC->createEvent($event);
                        echo "Event created successfully";
                        header('location:listEvent.php');
                    } else {
                        echo "Error uploading image";
                    }
                } else {
                    echo "Invalid file extension";
                }
            } else {
                // Create new event object without image and save to database
                $event = new event($_POST["id_org"], $_POST["id_event"], $_POST["nom"], $_POST["date_debut"], $_POST["date_fin"], $_POST["prix"], $_POST["description"]);
                $eventC = new eventC();
                $eventC->createEvent($event);
                echo "Event created successfully";
                header('location:listEvent.php');
            }
        } else {
            echo "Please fill all required fields";
        }
    }
?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="creat.js"></script>
  <link rel="stylesheet" href="creat.css">
  <title>Document</title>
</head>
<body>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="wrapper">
      <div class="title">
        Add form
      </div>
      <div class="form">
        <div class="input_field">
          <label>Identifiant d'organisateur</label>
          <input type="text" name="id_org" id="id_org" class="input" oninput="validateInput('id_org', /^\d{4}$/)">
          <span id="id_org_span"></span>
        </div>
        <div class="input_field">
          <label>Identifiant d'evenement</label>
          <input type="text" name="id_event" id="id_event" class="input" oninput="validateInput('id_event', /^\d{4}$/)">
          <span id="id_event_span"></span>
        </div>
        <div class="input_field">
          <label>Nom d'evenement</label>
          <input type="text" name="nom" id="nom" class="input" oninput="validateInput('nom', /^[a-zA-Z]+$/)">
          <span id="nom_span"></span>
        </div>
        <div class="input_field">
          <label>Date debut</label>
          <input type="date" name="date_debut" id="date_debut" class="input">
        </div>
        <div class="input_field">
          <label>Date Fin</label>
          <input type="date" name="date_fin" id="date_fin" class="input">
        </div>
        <div class="input_field">
          <label>Prix</label>
          <input type="text" name="prix" id="prix" class="input" oninput="validateInput('prix', /^\d+(\.\d{1,2})?$/)">
          <span id="prix_span"></span>
        </div>
        <div class="input_field">
          <label>Description</label>
          <textarea name="description" id="description" class="textarea"></textarea>
        </div>
        <div class="input_field">
          <label>Image</label>
          <input type="file" name="image" id="image">
        </div>
        <div class="input_field">
          <input type="submit" value="ADD" class="button">
        </div>
      </div>
    </div>
  </form>

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
</body>
</html>
