<?php 

class Model
{

    private $server = "localhost";
    private $username = "root";
    private $password="";
    private $db = "youthspace";
    private $conn;

    public function __construct(){
        try {
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    public function insert()
    {

        if (isset($_POST['submit']) && isset($_POST['nom'])  && isset($_POST['cat']) && isset($_POST['langue']) && isset($_POST['manager']))  
        {
            if (!empty($_POST['nom']) && !empty($_POST['cat']) && !empty($_POST['langue'])  && !empty($_POST['manager']) ) {
                
                $nom = $_POST['nom'];
                $cat = $_POST['cat'];
  
                $langue = $_POST['langue'];
                $manager = $_POST['manager'];

                $query = "INSERT INTO chaine (nom,cat,langue,manager) VALUES ('$nom','$cat','$langue','$manager')";
                if ($sql = $this->conn->query($query)) {
                   
                    echo "<script>alert('records added successfully');</script>";
                    echo "<script>window.location.href = 'creat_ch.php';</script>";
                }else{
                    
                    echo "<script>alert('failed');</script>";
                    echo "<script>window.location.href = 'creat_ch.php';</script>";
                }

            }else{
                echo "<script>alert('empty');</script>";
                echo "<script>window.location.href = 'creat_ch.php';</script>";
            }
        }
    }
    
    public function fetch(){
        $data = null;

        $query = "SELECT * FROM chaine;";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($nom){

        $query = "DELETE FROM chaine where nom = '$nom';";
        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }

	public function fetch_single($j2){

		$data = null;

		$query = "SELECT * FROM chaine WHERE nom = '$nom'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function edit($nom){

		$data = null;

		$query = "SELECT * FROM chaine WHERE nom = '$nom' ";
		if ($sql = $this->conn->query($query)) {
			while($row = $sql->fetch_assoc()){
				$data = $row;
			}
		}
		return $data;
	}

    public function update($data){

        $query = "UPDATE chaine SET cat='$data[cat]', langue='$data[langue]', manager='$data[manager]' WHERE nom='$data[nom] '";

        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }
}
 








