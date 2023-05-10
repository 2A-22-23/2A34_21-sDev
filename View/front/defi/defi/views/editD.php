<?php
require_once 'Md.php';

$model = new Model();

if (isset($_GET['j2'])) {
    $j2 = $_GET['j2'];
    $data = $model->edit($j2);
} else {
   // header("Location: editD.php");
    //exit();
}

if (isset($_POST['submit'])) {
    $datess = $_POST['datess'];
    $jeu = $_POST['jeu'];
    $recompance = $_POST['recompance'];
    $detail = $_POST['detail'];

    $data = [
        'j2' => $_POST['j2'],
        'datess' => $datess,
        'jeu' => $jeu,
        'recompance' => $recompance,
        'detail' => $detail,
    ];

    if ($model->update($data)) {
        echo "<script>alert('Record updated successfully.');</script>";
        echo "<script>window.location.href = 'RECORDSD.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to update record.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
</head>
<body>

<h2>Edit Record</h2>

<form method="post">

    <input type="text" name="j2" value="<?php echo $data['j2']; ?>">

    <label>Date:</label>
    <input type="date" name="datess" value="<?php echo $data['datess']; ?>" required>

    <label>Jeu:</label>
    <input type="text" name="jeu" value="<?php echo $data['jeu']; ?>" required>

    <label>Récompense:</label>
    <input type="text" name="recompance" value="<?php echo $data['recompance']; ?>" required>

    <label>Detail:</label>
    <textarea name="detail" required><?php echo $data['detail']; ?></textarea>

    <input type="submit" name="submit" value="Update Record">

</form>

</body>
</html>
