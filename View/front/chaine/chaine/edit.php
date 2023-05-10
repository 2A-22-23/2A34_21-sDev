<?php
require_once 'Model.php';

$model = new Model();

if (isset($_GET['nom'])) {
    $nom = $_GET['nom'];
    $data = $model->edit($nom);
} else {
   // header("Location: edit.php");
    //exit();
}

if (isset($_POST['submit'])) {
    $nom= $_POST['nom'];
    $cat = $_POST['cat'];
    $manager = $_POST['manager'];
    $langue = $_POST['langue'];

    $data = [
        'nom' => $_POST['nom'],
        'cat' => $cat,
        'langue' => $langue,
        'manager' => $manager,
        
    ];

    if ($model->update($data)) {
        echo "<script>alert('Record updated successfully.');</script>";
        echo "<script>window.location.href = 'page-1.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to update record.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
</head>
<body>

<h2>Edit Record</h2>

<form method="post">
<label>chaine</label>
    <input type="text" name="nom" placeholder="nom" value="">

    <label>categorie:</label>
    <input type="text" name="cat" value="" required>

    <label>langue:</label>
    <input type="text" name="langue" value="" required>

    <label>manager:</label>
    <input type="text" name="manager" value="" required>



    <input type="submit" name="submit" value="Update Record">

</form>

</body>
</html>
