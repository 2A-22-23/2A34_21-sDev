<?php
    require '../../Controller/clubC.php';

    $clubC = new clubC();
    $clubC->supprimerclub($_GET['id']);
    header('Location:afficherclubadmin.php');
?>