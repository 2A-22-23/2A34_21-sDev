<?php
include "../core/Config.php";

Class ProductC {
    

	
    function calculateRatingMean()
    {
        $db = Database::getConnexion();
    
        try {
            // Select the distinct product IDs from the rate table
            $sql = "SELECT DISTINCT product_id FROM rate";
            $productIds = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    
            // Iterate through each product ID and calculate its average rating
            $averages = array();
            foreach ($productIds as $productId) {
                $sql = "SELECT AVG(rating) AS average FROM rate WHERE product_id = :productId";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $average = $result['average'];
                if ($average !== null) {
                    $averages[$productId] = $average;
                }
            }
    
            return $averages;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
	
	function Afficherproducts()
	{
		$sql="SElECT * From produit";
		$db = Database::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
    function Afficherpaniers()
	{
		$sql="SElECT * From panier";
		$db = Database::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

    function recupereproduit($id)
{
    $sql = "SELECT * from produit where id=$id";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}


function deleteProduit($id)
{
    $db = Database::getConnexion();
    
    // Get the current total
    $total_sql = "SELECT SUM(prix) AS total FROM panier";
    $total_stmt = $db->prepare($total_sql);
    $total_stmt->execute();
    $total = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Delete the product
    $delete_sql = "DELETE FROM panier WHERE id = :id";
    $delete_stmt = $db->prepare($delete_sql);
    $delete_stmt->bindValue(':id', $id);
    try {
        $delete_stmt->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
    
    // Update the total
    $update_sql = "UPDATE panier SET total = :total";
    $update_stmt = $db->prepare($update_sql);
    $update_stmt->bindValue(':total', $total);
    try {
        $update_stmt->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


public function createPanierTable()
{
    $sqlCheckTable = "SELECT 1 FROM panier LIMIT 1";
    $db = Database::getConnexion();

    try {
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        // If the query throws an exception, it means that the table does not exist
        // Therefore, create the table
        $sqlCreateTable = "CREATE TABLE panier (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(50) NOT NULL Unique,
            descriptions VARCHAR(255) NOT NULL,
            genre VARCHAR(255) NOT NULL,
            prix VARCHAR(255) NOT NULL,
            img VARCHAR(255) NOT NULL
        )";

        $reqCreateTable = $db->query($sqlCreateTable);
    }
}

public function addToPanier($product)
{
    $db = Database::getConnexion();
    $query = "INSERT INTO panier (nom, descriptions, genre, prix, img) 
              VALUES (:nom, :descriptions, :genre, :prix, :img)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":nom", $product->getNom());
    $stmt->bindValue(":descriptions", $product->getDescriptions());
    $stmt->bindValue(":genre", $product->getGenre());
    $stmt->bindValue(":prix", $product->getPrix());
    $stmt->bindValue(":img", $product->getImg());
    $stmt->execute();
}

public function getProductById($id) {
    $db = Database::getConnexion();
    $query = "SELECT * FROM produit WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


}


?>