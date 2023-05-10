<?php
require_once '../../config.php';

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $db = config::getConnexion();
    $sql ="SELECT * FROM users WHERE nom LIKE '{$input}%' OR idu LIKE '{$input}%' OR prenom LIKE '{$input}%' OR age LIKE '{$input}%' OR sexe LIKE '{$input}%' OR email LIKE '{$input}%'";
    $result =$db->query($sql);
    if($result->rowCount()>0){
        echo "<table>
        <tr>
            <th>IDU</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>Sexe</th>
            <th>Email</th>
        </tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>".$row['idu']."</td>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenom']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['sexe']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<b> Il n'y a pas de données !</b>";
    }
}
?>
