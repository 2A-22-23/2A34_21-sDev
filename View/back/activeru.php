<?php
require_once "../../Controller/UserC.php";
$UserC = new UserC();
if (isset($_POST["idu"]) && isset($_GET["id"])){
    $id = $_GET['id'];
    $UserC->unban($_POST["idu"]);
    header('Location: listeu.php?id=' . $id);
} 
?>