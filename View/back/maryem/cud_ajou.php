<?php
include "../../../model/product.php";
include "../../../controller/ProductC.php";

if ( isset($_POST['nom']) and isset($_POST['descriptions']) and isset($_POST['genre']) and isset($_POST['prix']) and isset($_FILES['img'])) {
    $Product = new Product($_POST['nom'],$_POST['descriptions'],$_POST['genre'],$_POST['prix'], $_FILES['img']['name']);

    $target_dir = "./images/"; // Directory where the image file will be saved
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // File was successfully uploaded and saved
        $ProductC = new ProductC();
        $ProductC->ajouterProduit($Product);
        header('Location: ProduitAFF.php');
    } else {
        // There was an error uploading the file
        echo "Error uploading file.";
    }
} else {
    echo "Verify all fields are filled";
    var_dump($_POST);
var_dump($_FILES);
}
?>