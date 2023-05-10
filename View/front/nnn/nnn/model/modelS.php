<?php

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "YS";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function addStreamToDatabase($date, $name)
    {
        // Échapper les caractères spéciaux dans le nom du flux pour éviter les injections SQL
        $name = $this->conn->real_escape_string($name);

        // Requête SQL pour insérer la date et le nom du flux dans la base de données
        $sql = "INSERT INTO streams (date, name) VALUES ('$date', '$name')";

        // Exécution de la requête
        if ($this->conn->query($sql) === TRUE) {
            echo "Flux ajouté à la base de données avec succès.";
        } else {
            echo "Erreur lors de l'ajout du flux à la base de données: " . $this->conn->error;
        }
    }
    if ($action === 'startStreaming') {
        $model = new Model();
        $date = date("Y-m-d H:i:s"); // Obtient la date système au format YYYY-MM-DD HH:MM:SS
        $name = "Nom du flux"; // Remplacez "Nom du flux" par le nom réel du flux
        $model->addStreamToDatabase($date, $name);
        
        // Code pour démarrer le streaming
        // ...
        
        $response = array('success' => true);
        echo json_encode($response);
    }
    
}
?>

