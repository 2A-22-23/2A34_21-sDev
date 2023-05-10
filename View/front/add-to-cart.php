<?php
include "../../model/Product.php";
include "../../controller/ProC";

if (isset($_POST['nom']) and isset($_POST['descriptions']) and isset($_POST['genre']) and isset($_POST['prix']) and isset($_FILES['img'])) {
    $Product = new Product($_POST['nom'], $_POST['descriptions'], $_POST['genre'], $_POST['prix'], $_FILES['img']['name']);

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $ProductC = new ProductC();
        $result = $ProductC->insert($Product);
        if ($result) {
            // Product added to "produits" table successfully
            // Now add it to the "panier" table
            $db = Database::getConnexion();
            $query = "INSERT INTO panier (nom, descriptions, genre, prix, img) 
                      VALUES (:nom, :descriptions, :genre, :prix, :img)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":nom", $Product->getNom());
            $stmt->bindValue(":descriptions", $Product->getDescriptions());
            $stmt->bindValue(":genre", $Product->getGenre());
            $stmt->bindValue(":prix", $Product->getPrix());
            $stmt->bindValue(":img", $Product->getImg());
            $result = $stmt->execute();
            if ($result) {
                // Product added to "panier" table successfully
                header('Location: ProduitAFF.php');
            } else {
                echo "Error adding product to panier table.";
            }
        } else {
            echo "Error inserting product.";
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Verify all fields are filled";
}
?>
