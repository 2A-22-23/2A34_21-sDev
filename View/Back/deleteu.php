<?php
require_once "../../Controller/UserC.php";
$UserC = new UserC();

if (isset($_POST["idu"])){
    $UserC->deleteu($_POST["idu"]);
    header('Location: listeu.php');
}
?>