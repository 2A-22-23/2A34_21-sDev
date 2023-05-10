<?php
require_once '../model/sponsor.php';
require_once '../controller/sponsorC.php';


if (isset($_GET["id"])) {
  $sponsorC = new sponsorC();
  $list = $sponsorC->findsponsor($_GET["id"]);
  //var_dump($list);
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
            $sponsorC->updatesponsor($sponsor, $_GET["id"]); // pass $_GET["id"] as the second argument
            header('location:View\listSponsor.php');
          } else {
            echo "Failed to upload file.";
          }
        } else {
          echo "Invalid file extension.";
        }
      } else {
        $sponsor = new sponsor($_POST["id"], $_POST["nom"], $_POST["secteur_activite"], $_POST["date_debut"], $_POST["date_fin"], $_POST["montant_sponsoring"], $_POST["description_sponsorship"],$_POST["id_event"], $list->getImage());
            $sponsorC->updatesponsor($sponsor,$_GET["id"]);
            var_dump($sponsorC); // pass $_GET["id"] as the second argument
        header('location:View\listSponsor.php');
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

  <label for="id">SPONSOR ID:</label>
  <input type="text" id="id" name="id" value="<?php echo $list->getId(); ?>"><br><br>

  <label for="nom">Sponsor Name :</label>
  <input type="text" id="nom" name="nom" value="<?php echo $list->getNom(); ?>"><br><br>

  <label for="secteur_activite">secteur activité:</label>
  <input type="text" id="secteur_activite" name="secteur_activite" value="<?php echo $list->getSecteurActivite(); ?>"><br><br>

  <label for="date_debut">Start Date:</label>
  <input type="date" id="date_debut" name="date_debut" value="<?php echo $list->getDateDebut(); ?>"><br><br>

  <label for="date_fin">End Date:</label>
  <input type="date" id="date_fin" name="date_fin" value="<?php echo $list->getDateFin(); ?>"><br><br>

  <label for="montant_sponsoring">Price:</label>
  <input type="text" id="montant_sponsoring" name="montant_sponsoring" value="<?php echo $list->getMontantSponsoring(); ?>"><br><br>

  <label for="description_sponsorship">Description:</label>
  <textarea id="description_sponsorship" name="description_sponsorship"><?php echo $list->getDescriptionSponsorship(); ?></textarea><br><br>
  <label for="id_event">identifiant d'evenement:</label>
  <input type="text" id="id_event" name="id_event" value="<?php echo $list->getIdEvent(); ?>"><br><br>
  <label for="image">Image:</label>
  <input type="file" id="image" name="image"><br><br>

  <input type="submit" value="Update">
</form>
</body>
</html>