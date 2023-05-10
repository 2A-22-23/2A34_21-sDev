<?php 

class Model
{

    private $server = "localhost";
    private $username = "root";
    private $password="";
    private $db = "YS";
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

        if (isset($_POST['submit']) && isset($_POST['j2']) && isset($_POST['date']) && isset($_POST['jeu']) && isset($_POST['recompance']) && isset($_POST['detail']))  
        {
            if (!empty($_POST['j2']) && !empty($_POST['date']) && !empty($_POST['jeu']) && !empty($_POST['recompance']) && !empty($_POST['detail']) ) {
                
                $j2 = $_POST['j2'];
                $jeu = $_POST['jeu'];
                $date = $_POST['date'];
                $recompance = $_POST['recompance'];
                $detail = $_POST['detail'];

                $query = "INSERT INTO defi (j2,datess,jeu,recompance,detail) VALUES ('$j2','$date','$jeu','$recompance','$detail')";
                if ($sql = $this->conn->query($query)) {
                    echo "<script>alert('records added successfully');</script>";
                    echo "<script>window.location.href = 'reserver_defiD.php';</script>";
                }else{
                    echo "<script>alert('failed');</script>";
                    echo "<script>window.location.href = 'reserver_defiD.php';</script>";
                }

            }else{
                echo "<script>alert('empty');</script>";
                echo "<script>window.location.href = 'reserver_defiD.php';</script>";
            }
        }
    }
    
    public function fetch(){
        $data = null;

        $query = "SELECT * FROM defi";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($j2){

        $query = "DELETE FROM defi where j2 = '$j2';";
        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }

	public function fetch_single($j2){

		$data = null;

		$query = "SELECT * FROM defi WHERE j2 = '$j2'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function edit($j2){

		$data = null;

		$query = "SELECT * FROM defi WHERE j2 = '$j2' ";
		if ($sql = $this->conn->query($query)) {
			while($row = $sql->fetch_assoc()){
				$data = $row;
			}
		}
		return $data;
	}

    public function update($data){

        $query = "UPDATE defi SET datess='$data[datess]', jeu='$data[jeu]', recompance='$data[recompance]', detail='$data[detail]' WHERE j2='$data[j2] '";

        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }
}
