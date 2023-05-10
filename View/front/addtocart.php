<?php
 require_once(__DIR__ . '/../../Controller/proC.php'); 

 if(isset($_GET['id'])) {
     $id = $_GET['id'];
     $ProductC = new ProductC();
     $product = $ProductC->getProductById($id);
     if(!$product) {
         echo "Product not found.";
         die();
     }
 
     $db = config::getConnexion();
     try {
         // Check if table "panier" exists
         $sqlCheckTable = "SELECT 1 FROM panier LIMIT 1";
         $reqCheckTable = $db->query($sqlCheckTable);
     } catch (Exception $e) {
         // If the query throws an exception, it means that the table does not exist
         // Therefore, create the table
         $sqlCreateTable = "CREATE TABLE panier (
             id INT(11) AUTO_INCREMENT PRIMARY KEY,
             nom VARCHAR(50) NOT NULL,
             descriptions VARCHAR(255) NOT NULL,
             genre VARCHAR(255) NOT NULL,
             prix VARCHAR(255) NOT NULL,
             img VARCHAR(255) NOT NULL,
             product_id INT(11) NOT NULL,
             total DECIMAL(10,2) DEFAULT 0,
             FOREIGN KEY (product_id) REFERENCES produit(id)
         )";
         $reqCreateTable = $db->query($sqlCreateTable);
     }
 
     // Check if the product already exists in the cart
     $query = "SELECT * FROM panier WHERE product_id = :product_id";
     $stmt = $db->prepare($query);
     $stmt->bindValue(":product_id", $id);
     $stmt->execute();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
     $result = false;
     if($row) {
         // If the product exists, update the quantity or any other relevant fields
        
         header('Location: Produit.php');
     } else {
         // If the product does not exist, insert it into the cart
         $queryInsert = "INSERT INTO panier (nom, descriptions, genre, prix, img, product_id) 
                       VALUES (:nom, :descriptions, :genre, :prix, :img, :product_id )";
         $stmtInsert = $db->prepare($queryInsert);
         $stmtInsert->bindValue(":nom", $product['nom']);
         $stmtInsert->bindValue(":descriptions", $product['descriptions']);
         $stmtInsert->bindValue(":genre", $product['genre']);
         $stmtInsert->bindValue(":prix", $product['prix']);
         $stmtInsert->bindValue(":img", $product['img']);
         $stmtInsert->bindValue(":product_id", $id);
        
         $result = $stmtInsert->execute();
     }
 
 

        if($result) {
            // Calculate the total price of all products in the cart
            $queryTotal = "SELECT SUM(prix) as total FROM panier";
            $stmtTotal = $db->query($queryTotal);
            $total = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

            // Update the "total" column in the "panier" table
            $queryUpdate = "UPDATE panier SET total = :total";
            $stmtUpdate = $db->prepare($queryUpdate);
            $stmtUpdate->bindValue(":total", $total);
            $stmtUpdate->execute();

            header('Location: Produit.php');
        } else {
            echo "Error adding product to cart.";
        }
    } else {
        echo "Invalid request.";
    }
?>
