<?php
    require '../../Controller/eventC.php';
    $eventC = new eventC();
    if (isset ($_GET["id"])&&!empty($_GET["id"])){
        $list = $eventC->delete_event($_GET["id"]);
        
        header('location:listEvent.php');
    }
    else {
        echo "undefined id";
    }
?>
