<?php 

require_once('md.php');
$model = new Model();
	$j2 = $_GET['j2'];
	$delete = $model->delete($j2);

	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'defid.php';</script>";
	}

 ?>