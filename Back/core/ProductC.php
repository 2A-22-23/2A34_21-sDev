<?php
include "../core/Config.php";
Class ProductC {
    function ajouterProduit($Product)
    {
        $v1=$Product->getnom();
        $v2=$Product->getdescriptions();
        $v3=$Product->getgenre();
        $v4=$Product->getprix();
        $v5=$Product->getimg();
        
    
        // SQL query to check if table exists in database
        $sqlCheckTable = "SELECT 1 FROM produit LIMIT 1";
        $db = Database::getConnexion();
    
        try {
            $reqCheckTable = $db->query($sqlCheckTable);
        } catch (Exception $e) {
            // If the query throws an exception, it means that the table does not exist
            // Therefore, create the table
            $sqlCreateTable = "CREATE TABLE produit (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(50) NOT NULL Unique,
                descriptions VARCHAR(255) NOT NULL,
                genre VARCHAR(255) NOT NULL,
                prix FLOAT NOT NULL,
                img VARCHAR(255) NOT NULL
                
            )";
    
            $reqCreateTable = $db->query($sqlCreateTable);
        }
    
        // Insert data into table
        $sqlInsert = "INSERT INTO produit (nom, descriptions, genre, prix, img)
            VALUES ('$v1', '$v2', '$v3', '$v4' , '$v5')";
    
        try {
            $reqInsert = $db->prepare($sqlInsert);
            $reqInsert->execute();
            return true;
        } catch (Exception $e) {
            echo 'Erreur: '.$e->getMessage();
            return false;
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

    function deletePoduit($id)
    {
        $db = Database::getConnexion();
        
        // Delete records from the "commande" table that have a product_id equal to $id
        $sql1 = "DELETE FROM commande WHERE product_id = :product_id";
        $req1 = $db->prepare($sql1);
        $req1->bindValue(':product_id', $id);
        try {
            $req1->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
        
        // Delete records from the "panier" table that have a product_id equal to $id
        $sql2 = "DELETE FROM panier WHERE product_id = :product_id";
        $req2 = $db->prepare($sql2);
        $req2->bindValue(':product_id', $id);
        try {
            $req2->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    
        // Delete ratings that have a product_id equal to $id
        $sql3 = "DELETE FROM rate WHERE product_id = :product_id";
        $req3 = $db->prepare($sql3);
        $req3->bindValue(':product_id', $id);
        try {
            $req3->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
        
        // Delete the product with the specified id
        $sql4 = "DELETE FROM produit WHERE id = :id";
        $req4 = $db->prepare($sql4);
        $req4->bindValue(':id', $id);
        try {
            $req4->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
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


    function modifierproduit($Product, $id)
{
    $sql = "UPDATE produit SET nom=:nom, descriptions=:descriptions, genre=:genre, prix=:prix, img=:img WHERE id=:id";
    $db = Database::getConnexion();

    try {
        $req = $db->prepare($sql);
        $nom = $Product->getNom();
        $descriptions = $Product->getdescriptions();
        $genre = $Product->getgenre();
        $prix = $Product->getprix();
        $img = "";

        // Check if a new image file has been uploaded
        if (!empty($_FILES['img']['name'])) {
            $img = $_FILES['img']['name'];
            $target_dir = "images/";
            $target_file = $target_dir . basename($img);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        } else {
            // Use the current image file name
            $ProductC = new ProductC();
            $currentactor = $ProductC->recupereproduit($id);
            $img = $currentactor['img'];
        }

        $req->bindValue(':nom', $nom);
        $req->bindValue(':descriptions', $descriptions);
        $req->bindValue(':genre', $genre);
        $req->bindValue(':prix', $prix);
        $req->bindValue(':img', $img);
        $req->bindValue(':id', $id);
        $s = $req->execute();

    } catch (Exception $o) {
        echo "Erreur ! " . $o->getMessage();
    }
}

function afficherDESC()
     {
    $sql="select * from produit ORDER BY id DESC";
    $db = Database::getConnexion();
    return ($db->query($sql));
    
     }

   function afficherASC()
   {
    $sql="select * from produit ORDER BY id ASC";
    $db = Database::getConnexion();
    return ($db->query($sql));
    }

}
?>