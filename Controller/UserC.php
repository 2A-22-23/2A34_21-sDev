<?php
require_once dirname(__FILE__) . '/../Config.php';

Class UserC {
function ajouteruser($User)
{
    $v1 = $User->getNom();
    $v2 = $User->getPrenom();
    $v3 = $User->getAge();
    $v4 = $User->getSexe();
    $v5 = $User->getEmail();
    $v6 = $User->getMdp();
    $v7 = $User->getRole();

    // SQL query to check if table exists in database
    $sqlCheckTable = "SELECT 1 FROM Users LIMIT 1";
    $db = Database::getConnexion();

    try {
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        // If the query throws an exception, it means that the table does not exist
        // Therefore, create the table
        $sqlCreateTable = "CREATE TABLE Users (
            idu INT(11) AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(50) NOT NULL ,
            prenom VARCHAR(50) NOT NULL,
            age INT(11) NOT NULL,
            sexe VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            mdp VARCHAR(50) NOT NULL,
            roleu INT(11) NOT NULL,
            FOREIGN KEY (roleu) REFERENCES Roles(id)
        )";

        $reqCreateTable = $db->query($sqlCreateTable);
    }

    // Insert data into table using prepared statements
    $sqlInsert = "INSERT INTO Users (nom, prenom, age, sexe, email, mdp, roleu) VALUES (?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmtInsert = $db->prepare($sqlInsert);
        $stmtInsert->execute([$v1, $v2, $v3, $v4, $v5, $v6, $v7]);
        return true;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false;
    }
}

	

	
	
    function afficheu($roleu)
{
    $db = Database::getConnexion();
    $sql = "SELECT * from users where roleu=:roleu";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roleu', $roleu, PDO::PARAM_STR);
        $stmt->execute();
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}
function deleteu($idu)
{
    $sql = "DELETE FROM users WHERE idu =:idu";
    $db = Database::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':idu', $idu);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
    


}


?>