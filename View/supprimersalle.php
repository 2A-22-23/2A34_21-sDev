<?php
    require '../Controller/salleC.php';

    $salleC = new salleC();
    $salleC->supprimersalle($_GET['idsalle']);
    header('Location:affichersalle.php');
?>