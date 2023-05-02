<?php
include "../core/ProductC.php";

if(isset($_GET['id'])) {
    $productIDs = explode(",", $_GET['id']);
    $ProductC = new ProductC();
    $total = 0;
    foreach($productIDs as $id) {
        $product = $ProductC->getProductById($id);
        if(!$product) {
            // echo "Product not found.";
            die();
        }

        $db = Database::getConnexion();
        try {
            // Check if table "commande" exists
            $sqlCheckTable = "SELECT 1 FROM commande LIMIT 1";
            $reqCheckTable = $db->query($sqlCheckTable);
        } catch (Exception $e) {
            // If the query throws an exception, it means that the table does not exist
            // Therefore, create the table
            $sqlCreateTable = "CREATE TABLE commande (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(50) NOT NULL,
                descriptions VARCHAR(255) NOT NULL,
                genre VARCHAR(255) NOT NULL,
                prix VARCHAR(255) NOT NULL,
                img VARCHAR(255) NOT NULL,
                product_id INT(11) NOT NULL,
                FOREIGN KEY (product_id) REFERENCES produit(id)
            )";
            $reqCreateTable = $db->query($sqlCreateTable);
        }

        // Insert the product into the "commande" table
        $query = "INSERT INTO commande (nom, descriptions, genre, prix, img, product_id) 
                  VALUES (:nom, :descriptions, :genre, :prix, :img, :product_id )";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":nom", $product['nom']);
        $stmt->bindValue(":descriptions", $product['descriptions']);
        $stmt->bindValue(":genre", $product['genre']);
        $stmt->bindValue(":prix", $product['prix']);
        $stmt->bindValue(":img", $product['img']);
        $stmt->bindValue(":product_id", $id);
        
       
        $result = $stmt->execute();
        $total += $product['prix'];
    }
    header('Location: commande.php');
} else {
    echo "Invalid request.";
}
?>
