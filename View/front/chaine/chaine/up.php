<?php
include_once 'Model.php';

$model = new Model();

if(isset($_POST['update'])){

    $j2 = $_POST['j2'];
    $datess = $_POST['datess'];
    $jeu = $_POST['jeu'];
    $recompance = $_POST['recompance'];
    $detail = $_POST['detail'];

    $data = array(
        'j2' => $j2,
        'datess' => $datess,
        'jeu' => $jeu,
        'recompance' => $recompance,
        'detail' => $detail
    );

    if($model->update($data)){
        header('location: up.php');
    }else{
        echo "<script>alert('Failed');</script>";
        echo "<script>window.location.href='up.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Defi</title>
</head>
<body>
    <?php
        if(isset($_GET['j2'])){
            $j2 = $_GET['j2'];

            $result = $model->fetch();
            foreach ($result as $row) {
                if($row['j2'] == $j2){
    ?>
    <form method="POST" action="view/reserver_defiD.php">
        <input type="text" name="j2" value="<?php echo $row['j2']; ?>">
        <label>Date</label>
        <input type="date" name="datess" value="<?php echo $row['datess']; ?>"><br><br>
        <label>Jeu</label>
        <input type="text" name="jeu" value="<?php echo $row['jeu']; ?>"><br><br>
        <label>Récompense</label>
        <input type="text" name="recompance" value="<?php echo $row['recompance']; ?>"><br><br>
        <label>Détail</label>
        <input type="text" name="detail" value="<?php echo $row['detail']; ?>"><br><br>
        <button type="submit" name="update">Update</button>
    </form>
    <?php
                }
            }
        }
    ?>
</body>
</html>
