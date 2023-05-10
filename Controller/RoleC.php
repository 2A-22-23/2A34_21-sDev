<?php
require_once '../../config.php'; 
 
class RoleC {
    function ajouterrole($Role)
    {
        $v1=$Role->getroles();
      
        
    
        // SQL query to check if table exists in config
        $sqlCheckTable = "SELECT 1 FROM Roles LIMIT 1";
        $db = config::getConnexion();
    
        try {
            $reqCheckTable = $db->query($sqlCheckTable);
        } catch (Exception $e) {
            // If the query throws an exception, it means that the table does not exist
            // Therefore, create the table
            $sqlCreateTable = "CREATE TABLE Roles (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                roles VARCHAR(50) NOT NULL Unique
               
                
            )";
    
            $reqCreateTable = $db->query($sqlCreateTable);
        }
    
        // Insert data into table
        $sqlInsert = "INSERT INTO Roles (roles)
            VALUES ('$v1')";
    
        try {
            $reqInsert = $db->prepare($sqlInsert);
            $reqInsert->execute();
            return true;
        } catch (Exception $e) {
            echo 'Erreur: '.$e->getMessage();
            return false;
        }
    }

	

	
	function AfficherRoles()
	{
		$sql="SElECT * From roles";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
    function AfficherRoless()
	{
		$sql="SElECT * From roles";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

    function deleteRole($id)
    {
        $sql = "DELETE FROM roles WHERE id =:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererole($id)
{
    $sql = "SELECT * from roles where id=$id";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}
function recupereroleu($id)
{
    $sql = "SELECT * from roles where id=$id";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        $resultat = $liste->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultat) == 1) {
            return $resultat[0]['roles'];
        } else {
            return null;
        }
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}




    function modifierrole($Role, $id)
{
    $sql = "UPDATE roles SET roles=:roles WHERE id=:id";
    $db = config::getConnexion();

    try {
        $req = $db->prepare($sql);
        $roles = $Role->getroles();
 

        
        

        $req->bindValue(':roles', $roles);

        $req->bindValue(':id', $id);
        $s = $req->execute();

    } catch (Exception $o) {
        echo "Erreur ! " . $o->getMessage();
    }
}


}
?>