<?php
    
    require_once(__DIR__ . '/../../Controller/proC.php'); 

    if(isset($_GET['id']) and isset($_GET['rating'])) {
        $id = $_GET['id'];
        $rating = $_GET['rating'];
        $ProductC = new ProductC();
        $product = $ProductC->getProductById($id);
        if(!$product) {
            echo "Product not found.";
            die();
        }
    
        $db = config::getConnexion();
        try {
            // Check if table "rate" exists
            $sqlCheckTable = "SELECT 1 FROM rate LIMIT 1";
            $reqCheckTable = $db->query($sqlCheckTable);
        } catch (Exception $e) {
            // If the query throws an exception, it means that the table does not exist
            // Therefore, create the table
            $sqlCreateTable = "CREATE TABLE rate (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                rating VARCHAR(50) NOT NULL,
                product_id INT(11) NOT NULL,
           
                FOREIGN KEY (product_id) REFERENCES produit(id)
            )";
            $reqCreateTable = $db->query($sqlCreateTable);
        }
    
        // Insert the rating into the "rate" table
        $query = "INSERT INTO rate (rating, product_id) 
                  VALUES (:rating, :product_id)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":rating", $rating);
        $stmt->bindValue(":product_id", $id);
        $result = $stmt->execute();
        
        header('Location: Produit.php');
      
    } else {
        echo "Invalid request.";
    }
    
?>
