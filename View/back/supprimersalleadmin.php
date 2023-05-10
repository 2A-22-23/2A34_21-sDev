<?php
    require '../../Controller/salleC.php';

    $salleC = new salleC();
    $salleC->supprimersalle($_GET['id']);
    header('Location:affichersalleadmin.php');
?>