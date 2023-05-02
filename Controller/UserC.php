<?php
require_once dirname(__FILE__) . '/../Config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/YouthSpace/Modal/User.php';


Class UserC {
    private $db; // Définir la propriété $db
    public function __construct()
    {
        $this->db = Database::getConnexion(); // Initialiser la propriété $db
    }

    function ajouteruser($User)
    {
        $v1 = $User->getNom();
        $v2 = $User->getPrenom();
        $v3 = $User->getAge();
        $v4 = $User->getSexe();
        $v5 = $User->getEmail();
        $v6 = $User->getMdp();
        $v7 = $User->getRole();
        $v8 = $User->getTokenverif();

        // SQL query to check if table exists in database
        $sqlCheckTable = "SELECT 1 FROM Users LIMIT 1";
        $sqlCheckTableT = "SELECT 1 FROM Roles LIMIT 1";
        $db = Database::getConnexion();

        try {
            $reqCheckTable = $db->query($sqlCheckTable);
        } catch (Exception $e) {
            // If the query throws an exception, it means that the table does not exist
            // Therefore, create the table
            $sqlCreateTableT = "CREATE TABLE IF NOT EXISTS Roles (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                roles VARCHAR(50) NOT NULL Unique
            )";
            $sqlCreateTable = "CREATE TABLE Users (
                idu INT(11) AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(50) NOT NULL ,
                prenom VARCHAR(50) NOT NULL,
                age INT(11) NOT NULL,
                sexe VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL UNIQUE,
                mdp VARCHAR(50) NOT NULL,
                roleu INT(11) NOT NULL,
                etat INT(11) NOT NULL DEFAULT 0,
                token VARCHAR(255) DEFAULT NULL,
                tokene VARCHAR(255) DEFAULT NULL,
                tokenp VARCHAR(255) DEFAULT NULL,
                tokenverif VARCHAR(255) DEFAULT NULL,
                FOREIGN KEY (roleu) REFERENCES Roles(id)
            )";
          
          $reqCreateTableT = $db->query($sqlCreateTableT);

            $reqCreateTable = $db->query($sqlCreateTable);

        }
        $defaultEtat = 0;
        $Token= null;
        $TokenE= null;
        $TokenP= null;
        


        // Insert data into table using prepared statements
        $sqlInsert = "INSERT INTO Users (nom, prenom, age, sexe, email, mdp, roleu, etat, token, tokene, tokenp,tokenverif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmtInsert = $db->prepare($sqlInsert);
            $stmtInsert->execute([$v1, $v2, $v3, $v4, $v5, $v6, $v7, $defaultEtat, $Token, $TokenE, $TokenP,$v8]); // new token value
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

function ban($idu)
{
    $db = Database::getConnexion();
    $sql = "UPDATE users SET etat = 0 WHERE idu = :idu";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idu', $idu, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false;
    }
}

function unban($idu)
{
    $db = Database::getConnexion();
    $sql = "UPDATE users SET etat = 1 WHERE idu = :idu";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idu', $idu, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false;
    }
}
public function getLastInsertId()
{
    return $this->db->lastInsertId();
}
function getUserById($idu)
{
    $db = Database::getConnexion();
    $sql = "SELECT * FROM users WHERE idu = :idu";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idu', $idu, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return null;
    }
}



function supprimertokenv($idu)
{
    $db = Database::getConnexion();
    $sql = "UPDATE users SET tokenverif = NULL  WHERE idu = :idu";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idu', $idu, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false;
    }
}

function afficheut($roleu, $sort_by , $sort_order )
{
    $db = Database::getConnexion();
    $sql = "SELECT * from users where roleu=:roleu ORDER BY $sort_by $sort_order";
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







}


?>