<?php
class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "youthspace";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insert()
    {
        if (isset($_POST['submit']) && isset($_POST['j2']) && isset($_POST['date']) && isset($_POST['jeu']) && isset($_POST['recompance']) && isset($_POST['detail'])) {
            if (!empty($_POST['j2']) && !empty($_POST['date']) && !empty($_POST['jeu']) && !empty($_POST['recompance']) && !empty($_POST['detail'])) {
                $j2 = $_POST['j2'];
                $jeu = $_POST['jeu'];
                $date = $_POST['date'];
                $recompance = $_POST['recompance'];
                $detail = $_POST['detail'];

                $query = "INSERT INTO defi (j2, datess, jeu, recompance, detail) VALUES ('$j2', '$date', '$jeu', '$recompance', '$detail')";
                if ($this->conn->query($query) === TRUE) {
                    echo "<script>alert('Records added successfully');</script>";
                    echo "<script>window.location.href = 'reserver_defid.php';</script>";
                } else {
                    echo "<script>alert('Failed to add records');</script>";
                    echo "<script>window.location.href = 'reserver_defid.php';</script>";
                }
            } else {
                echo "<script>alert('Fields are empty');</script>";
                echo "<script>window.location.href = 'reserver_defid.php';</script>";
            }
        }
    }

    public function fetch()
    {
        $data = array();

        $query = "SELECT * FROM defi";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($j2)
    {
        $query = "DELETE FROM defi WHERE j2 = '$j2'";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($j2)
    {
        $data = null;

        $query = "SELECT * FROM defi WHERE j2 = '$j2'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function edit($j2)
    {
        $data = null;
    
        $query = "SELECT * FROM defi WHERE j2 = '$j2'";
        $result = $this->conn->query($query);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }
    

public function update($data)
{
    $query = "UPDATE defi SET datess = '$data[datess]', jeu = '$data[jeu]', recompance = '$data[recompance]', detail = '$data[detail]' WHERE j2 = '$data[j2]'";
    if ($this->conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

public function search($searchTerm)
{
    $data = array();

    $query = "SELECT * FROM defi WHERE j2 LIKE '%$searchTerm%' OR datess LIKE '%$searchTerm%' OR jeu LIKE '%$searchTerm%' OR recompance LIKE '%$searchTerm%' OR detail LIKE '%$searchTerm%'";
    $result = $this->conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

public function sort($column, $order)
{
    $data = array();

    $query = "SELECT * FROM defi ORDER BY $column $order";
    $result = $this->conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

public function getStatsByGame()
{
    $stats = array();

    // Requête pour obtenir les statistiques par jeu
    $query = "SELECT jeu, COUNT(*) as count FROM defi GROUP BY jeu";
    $result = $this->conn->query($query);

    // Parcourir les résultats et stocker les statistiques
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $game = $row['jeu'];
            $count = $row['count'];
            $stats[$game] = $count;
        }
    }

    return $stats;
}


}

?>