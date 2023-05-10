<?php
require_once '../model/event.php';
require_once '../controller/eventC.php';

if (isset($_GET["id"])) {
  $eventC = new eventC();
  $list = $eventC->findevent($_GET["id"]);
  var_dump($list);
  if (isset($_POST["id_org"], $_POST["id_event"], $_POST["nom"], $_POST["date_debut"], $_POST["date_fin"], $_POST["prix"], $_POST["description"])) {
    $id_org = $_POST["id_org"];
    $id_event = $_POST["id_event"];
    $nom = $_POST["nom"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $prix = $_POST["prix"];
    $description = $_POST["description"];

    // Check if any required field is empty
    if (!empty($id_org) && !empty($id_event) && !empty($nom) && !empty($date_debut) && !empty($date_fin) && !empty($prix) && !empty($description)) {
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
            $event = new event($id_org, $id_event, $nom, $date_debut, $date_fin, $prix, $description, $filename);
            $eventC->updateEvent($event, $_GET["id"]);
            header('location:listEvent.php');
            exit();
          } else {
            echo "Failed to upload file.";
          }
        } else {
          echo "Invalid file extension.";
        }
      } else {
        $event = new event($id_org, $id_event, $nom, $date_debut, $date_fin, $prix, $description, $list->getImage());
        $eventC->updateEvent($event, $_GET["id"]);
        header('location:listEvent.php');
        exit();
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
    <title>Update Event</title>
    <link rel="stylesheet" href="update.css">
    <script src="update.js"></script>
</head>
<body>
   
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="POST" enctype="multipart/form-data">
<!-- include the id parameter in the form's action and add enctype for file upload -->

  <label for="id_org">Organization ID:</label>
  <input type="text" id="id_org" name="id_org" value="<?php echo $list->getorganizer(); ?>"><br><br>

  <label for="id_event">Event ID:</label>
  <input type="text" id="id_event" name="id_event" value="<?php echo $list->getId(); ?>"><br><br>

  <label for="nom">Name:</label>
  <input type="text" id="nom" name="nom" value="<?php echo $list->get_name_event(); ?>"><br><br>

  <label for="date_debut">Start Date:</label>
  <input type="date" id="date_debut" name="date_debut" value="<?php echo $list->getdate_debut(); ?>"><br><br>

  <label for="date_fin">End Date:</label>
  <input type="date" id="date_fin" name="date_fin" value="<?php echo $list->getdate_fin(); ?>"><br><br>

  <label for="prix">Price:</label>
  <input type="text" id="prix" name="prix" value="<?php echo $list->getprix(); ?>"><br><br>

  <label for="description">Description:</label>
  <textarea id="description" name="description"><?php echo $list->getDescrip(); ?></textarea><br><br>

  <label for="image">Image:</label>
  <input type="file" id="image" name="image"><br><br>

  <input type="submit" value="Update">
</form>
</body>
</html>